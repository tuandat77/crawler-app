<?php


namespace App\Service\JobConfigService;


use App\Repository\DomainRepository;
use App\Repository\JobConfigRepository;

class JobConfigService
{
    private $jobConfigRepository;
    private $domainRepository;

    /**
     * JobConfigService constructor.
     * @param JobConfigRepository $jobConfigRepository
     */
    public function __construct(JobConfigRepository $jobConfigRepository) // khoi tao contruct duoc truyen class JobConfigRepository cung mot gia tri
    {
        $this->jobConfigRepository = $jobConfigRepository;
    }

    /**
     * @param $request
     * @param $domainId
     * @return array
     */
    public function buildDataInsertConfigJobFromRequest($request, $domainId)
    {
        $rawData = [];
        $rawData['job_name']            = $request->input('job_name');
        $rawData['workplace']           = $request->input('workplace');
        $rawData['hard_salary_min']     = $request->input('hard_salary_min');
        $rawData['hard_salary_max']     = $request->input('hard_salary_max');
        $rawData['job_posting_date']    = $request->input('job_posting_date');
        $rawData['expiration_date']     = $request->input('expiration_date');
        $rawData['job_description']     = $request->input('job_description');
        $rawData['entitlements']        = $request->input('entitlements');
        $rawData['job_requirements']    = $request->input('job_requirements');
        $rawData['skills']              = $request->input('skills');
        $rawData['degree']              = $request->input('degree');
        $rawData['company_name']        = $request->input('company_name');
        $rawData['company_address']     = $request->input('company_address');
        $rawData['contact']             = $request->input('contact');
        $rawData['email']               = $request->input('email');
        $rawData['website']             = $request->input('website');
        $rawData['logo']                = $request->input('logo');
        $rawData['image']               = $request->input('image');
        $rawData['domain_id']           = $domainId;
        $rawData['created_at']          = date("Y/m/d H:i:s");
        $rawData['updated_at']          = date("Y/m/d H:i:s");
        return $rawData;
    }


    /**
     * @param $domainId
     * @return JobConfigRepository|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getConfigByDomainId($domainId)
    {
        return $this->jobConfigRepository->findConfigByDomainId($domainId);
    }

    /**
     * @param $rawData
     * @return bool
     */
    public function updateConfig($rawData)
    {
        $isConfigJob = $this->jobConfigRepository->findConfigByDomainId($rawData['domain_id']);
        if($isConfigJob){
            $rawDataAfterUpdate = $rawData;
            unset($rawDataAfterUpdate['domain_id']); //hàm unset() sẽ loại bỏ một hoặc nhiều biến được truyền vào. Hàm unset() cũng có thể được sử dụng để loại bỏ một phần tử xác định trong mảng.
            return $this->jobConfigRepository->updateConfigByRawDataAndDomainId($rawDataAfterUpdate, $rawData['domain_id']);
        }
        return $this->jobConfigRepository->insertNewConfig($rawData);
    }

    /**
     * @param $domainId
     * @return \Illuminate\Support\Collection
     */
    public function listUrlLink($domainId)
    {
        return $this->jobConfigRepository->getListUrl($domainId);
    }

    /**
     * @param $url
     * @param $domainId
     * @return JobConfigRepository|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findUrlByUrlAndDomainId($url, $domainId)
    {
        return $this->jobConfigRepository->findConfigByDomainId($url, $domainId);
    }

    /**
     * @param $url
     * @return bool
     */
    public function validateUrl($url)
    {
        $result =  strpos($url,"https://") !== false
            || strpos($url,"http://") !== false
        ;
        return !$result;
    }

    /**
     * @param $rawData
     * @return bool
     */
    public function insertUrl($rawData)
    {
        return $this->jobConfigRepository->insertUrl($rawData);
    }
}
