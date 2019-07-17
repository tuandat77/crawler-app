<?php


namespace App\Repository;
use Illuminate\Support\Facades\DB;

class DomainRepository
{
    const TABLE_DOMAIN = 'domains';
    const ITEM_OF_PAGE = 10;

    public function insertDataDomain($rawData)
    {
        return DB::table(self::TABLE_DOMAIN)
            ->insert($rawData)
        ;
    }

    public function findDomainByName($domainName)
    {
        return DB::table(self::TABLE_DOMAIN)
            ->where('name', $domainName)
            ->count()
         ;
    }

    public function getListDomain()
    {
        return DB::table(self::TABLE_DOMAIN)
            ->orderBy('id', 'DESC')
            ->paginate(self::ITEM_OF_PAGE);

    }

    public function getIdDomain($domainId)
    {
        return DB::table(self::TABLE_DOMAIN)
            ->where('id',$domainId)
            ->first()
            ;
    }
}