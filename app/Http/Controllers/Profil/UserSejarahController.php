<?php

namespace App\Http\Controllers\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sejarah;
use Illuminate\Support\Facades\Storage;

class UserSejarahController extends Controller
{
    /**
     * Display sejarah page for public/users
     */
    public function index()
    {
        $sejarah = Sejarah::first();
        
        $data = [
            'sejarah' => $sejarah ? $this->parseMarkdownToHtml($sejarah->content) : null,
            'image' => $sejarah && $sejarah->image ? Storage::url($sejarah->image) : null,
            'raw_content' => $sejarah ? $sejarah->content : null
        ];

        return view('user.profil.sejarah', compact('data'));
    }

    /**
     * Parse markdown to HTML for display
     */
    private function parseMarkdownToHtml($content)
    {
        if (empty($content)) {
            return '';
        }

        // Convert markdown syntax to HTML
        $html = $content;

        // Headers (## Heading)
        $html = preg_replace('/^## (.+)$/m', '<h3><i class="fas fa-chevron-right"></i> $1</h3>', $html);
        $html = preg_replace('/^### (.+)$/m', '<h4>$1</h4>', $html);

        // Bold (**text**)
        $html = preg_replace('/\*\*(.+?)\*\*/', '<strong>$1</strong>', $html);

        // Italic (*text*)
        $html = preg_replace('/(?<!\*)\*(?!\*)(.+?)(?<!\*)\*(?!\*)/', '<em>$1</em>', $html);

        // Underline (__text__)
        $html = preg_replace('/__(.+?)__/', '<u>$1</u>', $html);

        // Lists (- item) with proper wrapping
        $lines = explode("\n", $html);
        $inList = false;
        $processedLines = [];
        
        foreach ($lines as $line) {
            $trimmed = trim($line);
            if (preg_match('/^- (.+)$/', $trimmed, $matches)) {
                if (!$inList) {
                    $processedLines[] = '<ul>';
                    $inList = true;
                }
                $processedLines[] = '<li>' . $matches[1] . '</li>';
            } else {
                if ($inList) {
                    $processedLines[] = '</ul>';
                    $inList = false;
                }
                $processedLines[] = $line;
            }
        }
        
        if ($inList) {
            $processedLines[] = '</ul>';
        }
        
        $html = implode("\n", $processedLines);

        // Quotes (> quote)
        $html = preg_replace('/^> (.+)$/m', '<div class="highlight-box"><p>$1</p></div>', $html);

        // Paragraphs - split by double newlines
        $paragraphs = preg_split('/\n\s*\n/', $html);
        $formattedParagraphs = [];
        
        foreach ($paragraphs as $para) {
            $para = trim($para);
            if (!empty($para)) {
                // Don't wrap if already has HTML tags
                if (!preg_match('/^<(h[1-6]|div|ul|ol|blockquote)/', $para)) {
                    $para = '<p>' . $para . '</p>';
                }
                $formattedParagraphs[] = $para;
            }
        }
        
        $html = implode("\n\n", $formattedParagraphs);

        // Single line breaks within paragraphs
        $html = preg_replace('/\n/', '<br>', $html);

        // Clean up
        $html = preg_replace('/<p><\/p>/', '', $html);
        $html = preg_replace('/<p>\s*<\/p>/', '', $html);
        $html = preg_replace('/<br>\s*<\/p>/', '</p>', $html);
        $html = preg_replace('/<p>\s*<br>/', '<p>', $html);

        return $html;
    }
}