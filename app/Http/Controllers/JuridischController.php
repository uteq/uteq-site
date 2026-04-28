<?php

namespace App\Http\Controllers;

use App\Support\JuridischDocument;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JuridischController extends Controller
{
    public function index()
    {
        $documents = collect(JuridischDocument::SLUGS)
            ->map(fn (string $slug) => JuridischDocument::load($slug));

        return view('pages.juridisch.index', [
            'documents' => $documents,
        ]);
    }

    public function show(string $slug)
    {
        if (! in_array($slug, JuridischDocument::SLUGS, true)) {
            throw new NotFoundHttpException();
        }

        $document = JuridischDocument::load($slug);

        return view('pages.juridisch.show', [
            'document' => $document,
        ]);
    }

    public function privacy()
    {
        return $this->show('privacy');
    }
}
