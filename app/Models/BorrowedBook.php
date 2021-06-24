<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

        /**
         * Get the book that is borrowed
         */
        public function book()
        {
            return $this->belongsTo(Book::class, 'book_id');
        }

        /**
         * Get the user who borrows the book
         */
        public function student()
        {
            return $this->belongsTo(User::class, 'student_id');
        }

}
