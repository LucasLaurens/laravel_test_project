<?php

namespace App\Repository\Eloquent;

use App\Models\Post;
use App\Repository\PostRepositoryInterface;
use Illuminate\Support\Collection;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{

   /**
    * PostRepository constructor.
    *
    * @param Post $model
    */
   public function __construct(Post $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function show(int $id): Collection
   {
       return $this->model->where('id', $id)->get()->map->postFormat();    
   }
}