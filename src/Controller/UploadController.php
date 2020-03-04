<?php


namespace App\Controller;


use App\Services\AwsS3UploadService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UploadController
{
    /**
     * @var AwsS3UploadService
     */
    private $awsS3UploadService;

    /**
     * UploadController constructor.
     * @param AwsS3UploadService $awsS3UploadService
     */
    public function __construct(AwsS3UploadService $awsS3UploadService)
    {
        $this->awsS3UploadService = $awsS3UploadService;
    }

    public function upload(Request $request)
    {
        $uploadedFile = $request->files->get('photo');
        $this->awsS3UploadService->upload($uploadedFile->pathName, $uploadedFile->originalName);

        return new JsonResponse();
    }
}