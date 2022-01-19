<?php

namespace Framework\App\Controllers;

use Framework\Helpers\TwigHelper;
use Framework\App\Repositories\BaseRepositories;
use Framework\App\Interfaces\BaseControllerInterface;

class BaseController implements BaseControllerInterface
{

    private BaseRepositories $repo;

    protected string $multiple = "base";
    protected string $single = "base";

    private $isAdmin = false;

    protected function setRepo(BaseRepositories $repo)
    {
        $this->repo = $repo;
        return $this;
    }

    protected function setIsAdmin(bool $isAdmin)
    {
        $this->isAdmin = $isAdmin;
        return $this;
    }

    protected function setMultiple(string $multiple)
    {
        $this->multiple = $multiple;
        return $this;
    }

    protected function setSingle(string $single)
    {
        $this->single = $single;
        return $this;
    }

    protected function getRepo()
    {
        return $this->repo;
    }

    protected function getIsAdmin()
    {
        return $this->isAdmin;
    }

    protected function getMultiple()
    {
        return $this->multiple;
    }

    protected function getSingle()
    {
        return $this->single;
    }

    public function view(string $file, array $params = [])
    {
        // $params["settings"] = (new SettingRepositories)->getSettings();
        $params["request"] = $_SERVER;
        $params["get"] = $_GET;
        $params["post"] = $_POST;
        $params["user"] = $_SESSION["user"] ?? null;
        TwigHelper::render($file, $params, $this->getIsAdmin());
    }

    public function index()
    {
        return $this->view($this->getMultiple(), [
            "entities" => $this->getRepo()->all(),
        ]);
    }

    /**
     * Fonction utilisé pour affiché qu'une seule entité
     *
     * @param int|string $id
     */
    public function show(int|string $id)
    {
        // $type = intval($id) ? "id" : "slug";
        // $entity = $this->repository->getBy($type, [$type => $id]);
        // if ($entity->getIsEmpty()) {
        //     return NotFoundException::render(404);
        // }
        // return $this->view("single-{$this->single}", [
        //     "id" => $id,
        //     "entity" => $entity,
        //     "alert" => new Alert(),
        // ]);
    }
}
