<?php
/**
 * Created by PhpStorm.
 * User: Elloyd Cruz
 * Date: 9/11/2019
 * Time: 10:05 AM
 */

namespace App\Modules\Importer\Services;

use App\Modules\Importer\Models\Player;
use App\Modules\Importer\Repositories\Contracts\PlayerRepositoryInterface;
use App\Modules\Importer\Services\Contracts\APIServiceInterface;
use App\Modules\Importer\Services\Contracts\ImporterServiceInterface;
use App\Modules\Importer\Transformers\PlayerDetailsTransformer;
use App\Modules\Importer\Transformers\PlayerTransformer;
use Illuminate\Support\Facades\DB;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

/**
 * Class ImporterService
 * @package App\Modules\Importer\Services
 */
class ImporterService implements ImporterServiceInterface
{
    /**
     * @var APIServiceInterface $apiService
     */
    protected $apiService;

    /**
     * @var PlayerRepositoryInterface
     */
    protected $playerRepository;

    /**
     * @var Manager $manager
     */
    protected $manager;

    /**
     * ImporterService constructor.
     *
     * @param APIServiceInterface $apiService
     * @param PlayerRepositoryInterface $playerRepository
     * @param Manager $manager
     */
    public function __construct(APIServiceInterface $apiService, PlayerRepositoryInterface $playerRepository, Manager $manager)
    {
        $this->apiService = $apiService;
        $this->playerRepository = $playerRepository;
        $this->manager = $manager;
    }

    /**
     * Get list of players
     *
     * @return mixed
     */
    public function getList()
    {
        if (!$list = $this->playerRepository->list()) {
            return [];
        }

        $paginator = $list->paginate();
        $buses = $paginator->getCollection();

        $resources = new Collection($buses, new PlayerTransformer);
        $resources->setPaginator(new IlluminatePaginatorAdapter($paginator));

        return $this->manager
            ->createData($resources)
            ->toArray();
    }

    /**
     * Get details of a single player
     *
     * @param int $player
     * @return mixed
     */
    public function getDetails(int $player)
    {
        if (!$details = $this->playerRepository->details($player)) {
            return [];
        }

        $resources = new Item($details, new PlayerDetailsTransformer);

        return $this->manager
            ->createData($resources)
            ->toArray();
    }

    /**
     * Populate player table from Providers API
     *
     * @return mixed
     */
    public function populate()
    {
        $mapper = config('api.mapper');
        $elements = collect(json_decode($this->apiService->get()))
            ->pull($mapper['root']);

        if ($elements) {
            foreach ($elements as $element) {
                $this->playerRepository->add(
                    [
                        'code' => $element->{$mapper['code']}
                    ],
                    [
                        'first_name' => $element->{$mapper['first_name']},
                        'second_name' => $element->{$mapper['second_name']},
                        'total_points' => $element->{$mapper['total_points']},
                        'influence' => $element->{$mapper['influence']},
                        'creativity' => $element->{$mapper['creativity']},
                        'threat' => $element->{$mapper['threat']},
                        'ict_index' => $element->{$mapper['ict_index']},
                    ]
                );
            }
        }

        return false;
    }
}
