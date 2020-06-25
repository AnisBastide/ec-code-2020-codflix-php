<?php

require_once('database.php');

class Media
{

    protected $id;
    protected $genre_id;
    protected $title;
    protected $type;
    protected $status;
    protected $release_date;
    protected $summary;
    protected $trailer_url;

    public function __construct($media)
    {

        $this->setId(isset($media->id) ? $media->id : null);
        $this->setGenreId($media->genre_id);
        $this->setTitle($media->title);
    }

    /***************************
     * -------- SETTERS ---------
     ***************************/

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setGenreId($genre_id)
    {
        $this->genre_id = $genre_id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;
    }

    /***************************
     * -------- GETTERS ---------
     ***************************/

    public function getId()
    {
        return $this->id;
    }

    public function getGenreId()
    {
        return $this->genre_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getReleaseDate()
    {
        return $this->release_date;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function getTrailerUrl()
    {
        return $this->trailer_url;
    }

    /***************************
     * -------- GET LIST --------
     ***************************/

    public static function filterMedias($title)
    {

        // Open database connection
        $db = init_db();

        if ($title == "") {

            $req = $db->prepare("SELECT * FROM media ORDER BY release_date DESC");
            $req->execute();
            $result = $req->fetchAll();
        } else {
            $req = $db->prepare("SELECT title FROM media ORDER BY release_date DESC");
            $req->execute();
            $tab = $req->fetchAll(PDO::FETCH_ASSOC);
            $filteredList = Media::search($tab, $title);
            $filteredString = implode("', '", $filteredList);
            $req = $db->prepare("SELECT * FROM media WHERE title IN ('$filteredString') ORDER BY release_date DESC");
            $req->execute();
            $result = $req->fetchAll();
        }

        // Close database connection
        $db = null;

        return $result;

    }

    //for the moment the search is not perfect, it will find every media where the search is in so if you write "c" it will also find "Michel"
    public static function search($tab, $search)
    {
        $list = array();
        foreach ($tab as $array) {
            foreach ($array as $title) {
                if (strpos(strtolower($title), strtolower($search)) !== false) {
                    array_push($list, $title);
                }
            }
        }

        return ($list);
    }

    public static function getMediaById($id)
    {
        $db = init_db();

        $req = $db->prepare("SELECT * FROM media where id = ? ");
        $req->execute(array($id));
        return $req->fetch();
    }

    public static function getGenreByid($genre_id)
    {
        $db = init_db();
        $req = $db->prepare("SELECT * FROM genre where id = ? ");
        $req->execute(array($genre_id));
        return $req->fetch();
    }

    public static function getTypeById($id)
    {
        $db = init_db();
        $req = $db->prepare("SELECT type FROM media where id = ? ");
        $req->execute(array($id));
        return $req->fetch();
    }

    public static function getNumberOfSeason($series_id)
    {
        $db = init_db();
        $req = $db->prepare("SELECT DISTINCT season FROM episode where serie_id = ? ");
        $req->execute(array($series_id));
        return $req->rowCount();
    }

    public static function getNumberOfEpisode($season_id)
    {
        $db = init_db();
        $req = $db->prepare("SELECT episode_number FROM episode where season = ? ");
        $req->execute(array($season_id));
        return $req->rowCount();
    }

    public static function getEpisodesInformation($series_id, $season_id, $episode_number)
    {
        $db = init_db();
        $req = $db->prepare("SELECT * FROM episode where serie_id ='" . $series_id . "' and season='" . $season_id . "' and episode_number='" . $episode_number . "'");
        $req->execute();
        return $req->fetchAll();
    }
}

