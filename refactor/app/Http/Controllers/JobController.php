<?php

namespace DTApi\Http\Controllers;

use DTApi\Models\Job;
use DTApi\Http\Requests;
use DTApi\Models\Distance;
use Illuminate\Http\Request;
use DTApi\Repository\BookingRepository;

/**
 * Class BookingController
 * @package DTApi\Http\Controllers
 */
class JobController extends Controller
{

    /**
     * @var BookingRepository
     */
    protected $repository;

    /**
     * @var UserRepository
     */
    protected $userRepo;

    /**
     * @var JobRepository
     */
    protected $jobRepo;

    /**
     * BookingController constructor.
     * @param BookingRepository $bookingRepository
     */
    public function __construct(BookingRepository $bookingRepository, UserRepository $userRepository, JobRepository $jobRepository)
    {
        $this->repository = $bookingRepository;
        $this->userRepo = $userRepository;
        $this->jobRepo = $jobRepository;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function immediateJobEmail(Request $request)
    {
        $adminSenderEmail = config('app.adminemail');
        $data = $request->all();

        $response = $this->jobRepo->storeJobEmail($data);

        return response($response);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getHistory(Request $request)
    {
        if($user_id = $request->get('user_id')) {

            $response = $this->userRepo->getUsersJobsHistory($user_id, $request);
            return response($response);
        }

        return null;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function acceptJob(Request $request)
    {
        $data = $request->all();
        $user = $request->__authenticatedUser;

        $response = $this->jobRepo->acceptJob($data, $user);

        return response($response);
    }

    public function acceptJobWithId(Request $request)
    {
        $data = $request->get('job_id');
        $user = $request->__authenticatedUser;

        $response = $this->jobRepo->acceptJobWithId($data, $user);

        return response($response);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function cancelJob(Request $request)
    {
        $data = $request->all();
        $user = $request->__authenticatedUser;

        $response = $this->jobRepo->cancelJobAjax($data, $user);

        return response($response);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function endJob(Request $request)
    {
        $data = $request->all();

        $response = $this->jobRepo->endJob($data);

        return response($response);

    }

     /**
     * @param Request $request
     * @return mixed
     */
    public function getPotentialJobs(Request $request)
    {
        $data = $request->all();
        $user = $request->__authenticatedUser;

        $response = $this->jobRepo->getPotentialJobs($user);

        return response($response);
    }

        public function distanceFeed(DistanceFeedRequest $request)
    {
        $data = $request->all();
     
        if (isset($data['jobid']) && $data['jobid'] != "") {

            $affectedRows = $this->distanceRepository->update($data);
            $affectedRows1 = $this->jobRepository->update($data);
        }

        return response('Record updated!');
    }


}