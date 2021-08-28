<?php
namespace App\Repository;

use App\Model\Post;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
   public function show(int $id): Collection;
}