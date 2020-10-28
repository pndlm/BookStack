<?php

namespace BookStack\Console\Commands;

use BookStack\Actions\Comment;
use BookStack\Actions\CommentRepo;
use BookStack\Entities\Book;
use Illuminate\Console\Command;

class RebuildBookPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bookstack:rebuild-book-permissions {--book= : Which book to rebuild.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rebuild permission by book';

    /**
     * @var CommentRepo
     */
    protected $commentRepo;

    /**
     * Create a new command instance.
     */
    public function __construct(CommentRepo $commentRepo)
    {
        $this->commentRepo = $commentRepo;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $book = Book::find($this->option('book'));
        if ($book !== null) {
            $book->rebuildPermissions();

            $this->comment('The permissions for this book has been rebuilt');
        }
    }
}
