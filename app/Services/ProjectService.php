<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Storage;
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
         return $this->projectRepository->getProjectQuery();
    }

    public function updateProject($projectId, $projectRequest)
    {
        $project = $this->getAllProjects()->find($projectId);

        if ($project) {

            if (!empty($projectRequest['project_logo'])) {

                $projectLogo = $projectRequest['project_logo'];

                # upload project logo
                $projectLogoPath = $projectLogo->store('projects', 'public');

                # save the project logo path in request
                $projectRequest['project_logo'] = $projectLogoPath;

                # delete the old logo
                if ($project->project_logo && file_exists(public_path('storage/'.$project->project_logo))) {
                    unlink(public_path('storage/'.$project->project_logo));
                }

            } else {
                # if in request not project_logo, keep the existing logo
                $projectRequest['project_logo'] = $project->project_logo;
            }

            $projectRequest['slug'] = Str::slug($projectRequest['name']);

            $project->update($projectRequest);
            return $project;
        }
    }

    public function deleteProject($projectId)
    {
        $project = $this->getAllProjects()->find($projectId);

        if ($project) {

            # again this not working ...
            //if ($project->project_logo && Storage::exists($project->project_logo)) {
            //    Storage::delete($project->project_logo);
            //}

            if ($project->project_logo && file_exists(public_path('storage/'.$project->project_logo))) {
                unlink(public_path('storage/'.$project->project_logo));
            }

            return $project->delete();
        }
    }
}
