<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Illuminate\Support\Str;

class ProjectService
{
    protected $projectRepository;
    /**
     * Create a new class instance.
     */
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function saveProject($projectRequest)
    {
        if (!empty($projectRequest['project_logo'])) {
            $projectLogo = $projectRequest['project_logo'];

            # upload project logo
            $projectLogoPath = $projectLogo->store('projects', 'public');

            # save the project logo path in request
            $projectRequest['project_logo'] = $projectLogoPath;
        }

        $projectRequest['slug'] = Str::slug($projectRequest['name']);

        return $this->projectRepository->saveProject($projectRequest);
    }

    public function getAllProjects()
    {
        // time 47:05
        return $this->projectRepository->getProjectQuery();
    }
}
