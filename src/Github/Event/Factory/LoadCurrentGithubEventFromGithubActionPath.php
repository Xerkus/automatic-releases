<?php

declare(strict_types=1);

namespace Laminas\AutomaticReleases\Github\Event\Factory;

use Laminas\AutomaticReleases\Environment\EnvironmentVariables;
use Laminas\AutomaticReleases\Github\Event\MilestoneClosedEvent;

use function Psl\File\read;

final class LoadCurrentGithubEventFromGithubActionPath implements LoadCurrentGithubEvent
{
    private EnvironmentVariables $variables;

    public function __construct(EnvironmentVariables $variables)
    {
        $this->variables = $variables;
    }

    public function __invoke(): MilestoneClosedEvent
    {
        $path = $this->variables->githubEventPath();

        return MilestoneClosedEvent::fromEventJson(read($path));
    }
}
