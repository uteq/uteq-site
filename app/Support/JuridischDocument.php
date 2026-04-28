<?php

namespace App\Support;

use Illuminate\Support\Facades\File;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\MarkdownConverter;

class JuridischDocument
{
    public const SLUGS = [
        'algemene-voorwaarden',
        'saas-voorwaarden',
        'verwerkersovereenkomst',
        'privacy',
    ];

    public function __construct(
        public readonly string $slug,
        public readonly string $titel,
        public readonly string $versie,
        public readonly string $ingangsdatum,
        public readonly string $html,
        public readonly array $frontmatter,
    ) {
    }

    public static function load(string $slug): self
    {
        $path = resource_path("views/juridisch/source/{$slug}.md");

        if (! File::exists($path)) {
            throw new \RuntimeException(
                "Bron-MD ontbreekt voor {$slug}: {$path}. Draai scripts/sync-juridisch.sh."
            );
        }

        $markdown = File::get($path);
        $rendered = self::converter()->convert($markdown);

        $frontmatter = [];
        if ($rendered instanceof RenderedContentWithFrontMatter) {
            $frontmatter = $rendered->getFrontMatter() ?? [];
        }

        $html = (string) $rendered->getContent();
        $html = self::cleanFirstHeading($html);

        return new self(
            slug: $slug,
            titel: (string) ($frontmatter['titel'] ?? $slug),
            versie: self::normalizeVersion($frontmatter['versie'] ?? ''),
            ingangsdatum: self::normalizeDate($frontmatter['ingangsdatum'] ?? ''),
            html: $html,
            frontmatter: $frontmatter,
        );
    }

    private static function normalizeVersion(mixed $value): string
    {
        if (is_float($value)) {
            $formatted = rtrim(rtrim(number_format($value, 2, '.', ''), '0'), '.');
            return $formatted === '' ? '0' : (str_contains($formatted, '.') ? $formatted : $formatted.'.0');
        }

        return (string) $value;
    }

    private static function normalizeDate(mixed $value): string
    {
        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d');
        }

        if (is_int($value)) {
            return (new \DateTimeImmutable('@'.$value))->format('Y-m-d');
        }

        return (string) $value;
    }

    public function pdfFilename(): string
    {
        return "{$this->slug}-v{$this->versie}.pdf";
    }

    public function pdfUrl(): string
    {
        return "/juridisch/{$this->pdfFilename()}";
    }

    public function pdfExists(): bool
    {
        return File::exists(public_path("juridisch/{$this->pdfFilename()}"));
    }

    public function ingangsdatumFormatted(): string
    {
        if ($this->ingangsdatum === '') {
            return '';
        }

        try {
            return \Carbon\Carbon::parse($this->ingangsdatum)
                ->locale('nl')
                ->translatedFormat('j F Y');
        } catch (\Throwable) {
            return $this->ingangsdatum;
        }
    }

    private static function converter(): MarkdownConverter
    {
        $environment = new Environment([
            'html_input' => 'allow',
            'allow_unsafe_links' => false,
        ]);
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new GithubFlavoredMarkdownExtension());
        $environment->addExtension(new FrontMatterExtension());

        return new MarkdownConverter($environment);
    }

    /**
     * Verwijder de eerste H1 uit de gerenderde HTML; die wordt apart gerenderd in de pagina-hero.
     */
    private static function cleanFirstHeading(string $html): string
    {
        return preg_replace('/<h1\b[^>]*>.*?<\/h1>/s', '', $html, 1) ?? $html;
    }
}
