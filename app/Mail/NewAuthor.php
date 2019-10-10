<?php

namespace App\Mail;

use App\Author;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAuthor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The author instance.
     *
     * @var Author
     */
    public $author;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Author $author)
    {

        $this->author = $author;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('author.email')
        ->with([
            'name' => $this->author->name,
            'surname' => $this->author->surname
        ]);
    }
}