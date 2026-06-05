<?php

namespace App\Repositories\Music;

use App\Domain\Search\DTOs\SearchMusicData;
use App\Models\Music;
use App\Repositories\Music\Contracts\IMusicRepo;
use DB;

class MusicRepo implements IMusicRepo
{
    private const DEFAULT_LIMIT = 5;

    public function search(SearchMusicData $data)
    {  
        $query = DB::table('musics')
            ->select('id', 'title');
 
        if (!empty($data->title)) {
            $query->selectRaw(
                'MATCH(title) AGAINST(? IN NATURAL LANGUAGE MODE) AS relevance_score',
                [$data->title]
            );
            $query->orderBy('relevance_score', 'DESC');
        }
 
        if (!empty($data->artist_id)) {
            $query->where('artist_id', $data->artist_id);
        }

        if (!empty($data->genre_id)) {
            $query->where('genre_id', $data->genre_id);
        }

        $query->limit(self::DEFAULT_LIMIT);

        return $query->get();
    }

}