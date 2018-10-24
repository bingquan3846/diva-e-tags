<?php


namespace Divae\TagsFilter\Domain\Repository;


class TagRepository extends \GeorgRinger\News\Domain\Repository\TagRepository
{

    public function initializeObject()
    {
        $defaultQuerySettings = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\QuerySettingsInterface::class);
        $defaultQuerySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($defaultQuerySettings);
    }

    public function findByService($service)
    {
        $query = $this->createQuery();

        $query->matching($query->contains('service', $service));

        return $query->execute();
    }
}