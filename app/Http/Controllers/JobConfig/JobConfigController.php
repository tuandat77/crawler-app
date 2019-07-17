<?php


namespace App\Http\Controllers\JobConfig;


use App\Http\Controllers\Controller;
use App\Http\Requests\AddConfigRequest;
use App\Service\ConfigDomainService\ConfigDomainService;
use App\Service\JobConfigService\JobConfigService;

class JobConfigController extends Controller
{
    private $configService;
    private $configDomainService;

    /**
     * JobConfigController constructor.
     * @param JobConfigService $configService
     */
    public function __construct(JobConfigService $configService) // khoi tao mot construct voi class trong service
    {
        $this->configService       = $configService;
    }

    /**
     * @param $domainId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewJobConfig($domainId) // tao mot FS truyen vao ID cua domain
    {
        $jobConfig = $this->configService->getConfigByDomainId($domainId); // tao mot gia tri duoc truyen vao tu construct khoi tao ben tren vaf chi den Fs trong class trong service
        return view('jobConfig.jobConfig', ['jobConfig' => $jobConfig]);
    }

    /**
     * @param AddConfigRequest $request
     * @param $domainId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateConfig(AddConfigRequest $request, $domainId) // tao mot FS truyen vao validate, request va domainId
    {
        // tao mot gia tri duoc chi den construct tao ben tren va chi den Fs trong class ma khoi tao ben tren, truen vao fs do request va domaiId
        $rawData = $this->configService->buildDataInsertConfigJobFromRequest(request(), $domainId); //request la gia tri lay tu trong fs trong class JobConfigService trong service
        $this->configService->updateConfig($rawData);// tro gia tri lay duoc tu ben tren va truyen vao Fs updateConfig trong class JobConfigService trong service
        $jobConfig = $this->configService->getConfigByDomainId($domainId); // tao gia tri duoc tro den FS getConfigByDomainId de lay data du lieu da duoc update ben tren sau do return hien ra trong view
        return view('jobConfig.jobConfig', [
            'message'   => 'update thành công',
            'jobConfig' => $jobConfig
        ]);
    }

    /**
     * @param $domainId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewListUrlLink($domainId)
    {
        $rawDataListUrl = $this->configService->listUrlLink($domainId);
        $jobConfig = $this->configService->getConfigByDomainId($domainId);

        return view('jobConfig.jobConfig',[
            'rawDataListUrl' => $rawDataListUrl,
            'jobConfig'      => $jobConfig
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function AddUrl()
    {
        $rawData = request()->input(); // lay tat ca du lieu duoc gui tu ben frontend

        if(!isset($rawData['url'])){  // kiem tra xem da co du lieu url chua
            return response()->json([ // tra ve dang json de gui lai cho ben frontend
                'message' => 'Url không được để trống',
                'code'  => 1
            ],200);
        }

        if($this->configService->validateUrl($rawData['url'])){
            return response()->json([
                'message' => 'Url không đúng định dạng',
                'code'    => 2
            ],200);
        }

        // kiem tra xem da ton tai url voi domain do chua
        $isUrlExit = $this->configService->findUrlByUrlAndDomainId($rawData['url'], $rawData['domain_id']);

        if($isUrlExit){
            return response()->json([
                'message' => 'Url đã tồn tại',
                'code'    => 3
            ],200);
        }

        // du lieu khi duoc lay tu ben frontend
        $rawDataInsert = [
            'url'        => $rawData['url'],
            'type'       => $rawData['type'],
            'domain_id'  => $rawData['domain_id'],
            'created_at' => date("Y/m/d H:i:s"),
            'updated_at' => date("Y/m/d H:i:s"),

        ];

        $this->configService->insertUrl($rawDataInsert);
        return response()->json([
            'message' => 'Thêm mới URL thành công',
            'code'   => 4
        ]);


    }
}
