<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    /**
     * Menampilkan halaman sejarah untuk user/frontend
     */
    public function index()
    {
        $sejarah = Sejarah::first();
        
        // Parse markdown to HTML
        $sejarahContent = '';
        if ($sejarah && $sejarah->content) {
            $sejarahContent = $this->parseMarkdownToHtml($sejarah->content);
        }
        
        $data = [
            'sejarah' => $sejarahContent,
            'image' => $sejarah?->image ?? null
        ];
        
        return view('user.profil.sejarah', compact('data'));
    }

    /**
     * Helper method untuk parse markdown ke HTML
     * Mengkonversi format markdown sederhana menjadi HTML
     */
    private function parseMarkdownToHtml($content)
    {
        // Escape HTML characters untuk keamanan
        $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
        
        // Bold: **text** menjadi <strong>text</strong>
        $content = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $content);
        
        // Italic: *text* menjadi <em>text</em>
        $content = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $content);
        
        // Underline: __text__ menjadi <u>text</u>
        $content = preg_replace('/__(.*?)__/', '<u>$1</u>', $content);
        
        // Heading: ## Text menjadi <h3>
        $content = preg_replace_callback('/\n## (.*?)(?=\n|$)/', function($matches) {
            return "\n<h3><i class=\"fas fa-calendar-alt\"></i> " . trim($matches[1]) . "</h3>\n";
        }, $content);
        
        // Quote/Highlight: > text menjadi highlight box
        $content = preg_replace_callback('/\n> (.*?)(?=\n\n|\n(?!>)|$)/s', function($matches) {
            $text = trim(str_replace("\n> ", "\n", $matches[1]));
            return "\n<div class=\"highlight-box\"><p>" . nl2br($text) . "</p></div>\n";
        }, $content);
        
        // List items: - item menjadi <li>
        $content = preg_replace_callback('/(?:^|\n)((?:- .*(?:\n|$))+)/', function($matches) {
            $items = $matches[1];
            // Ambil setiap item
            preg_match_all('/- (.*?)(?=\n|$)/', $items, $listItems);
            $listHtml = "<ul>\n";
            foreach ($listItems[1] as $item) {
                $listHtml .= "<li>" . trim($item) . "</li>\n";
            }
            $listHtml .= "</ul>\n";
            return "\n" . $listHtml;
        }, "\n" . $content);
        
        // Paragraphs - split by double newline
        $blocks = preg_split('/\n\n+/', $content);
        $result = '';
        
        foreach ($blocks as $block) {
            $block = trim($block);
            
            if (empty($block)) {
                continue;
            }
            
            // Skip jika sudah merupakan HTML tag
            if (preg_match('/^<(h3|ul|div)/', $block)) {
                $result .= $block . "\n\n";
            } else {
                // Convert newlines to <br> and wrap in <p>
                $block = nl2br($block);
                $result .= "<p>" . $block . "</p>\n\n";
            }
        }
        
        return trim($result);
    }

    /**
     * Alternative: Parse dengan library tambahan (jika ingin lebih kompleks)
     * Uncomment jika Anda install library parsedown: composer require erusev/parsedown
     */
    /*
    private function parseMarkdownToHtml($content)
    {
        $parsedown = new \Parsedown();
        $parsedown->setSafeMode(true); // Untuk keamanan
        
        $html = $parsedown->text($content);
        
        // Custom replacements untuk icon heading
        $html = preg_replace(
            '/<h2>(.*?)<\/h2>/', 
            '<h3><i class="fas fa-calendar-alt"></i> $1</h3>', 
            $html
        );
        
        // Custom replacements untuk blockquote jadi highlight-box
        $html = preg_replace(
            '/<blockquote>\s*<p>(.*?)<\/p>\s*<\/blockquote>/s',
            '<div class="highlight-box"><p>$1</p></div>',
            $html
        );
        
        return $html;
    }
    */
}