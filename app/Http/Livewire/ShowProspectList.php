<?php

namespace App\Http\Livewire;

use App\Models\PeopleDataLabs;
use App\Models\Prospect;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ShowProspectList extends Component
{
    public Prospect $prospect;
    public array $linkedInUrls = [];

    public function mount(string $list = null)
    {
        if ($list) {
            $this->prospect = Prospect::find($list);
        } else {
            $this->prospect = new Prospect();
        }
        $this->linkedInUrls = explode("\n", trim($this->prospect->linkedin_urls));
    }

    public function render()
    {
        return view('livewire.show-prospect-list');
    }

    public function export()
    {
        $profiles = PeopleDataLabs::whereStatus('success')
            ->whereIn('linkedin_url', $this->linkedInUrls)
            ->get();
        $csv = [];
        $first = true;
        foreach ($profiles as $profile) {
            $line = $this->makeCsvLine($profile->data);
            if ($first) {
                $csv[] = $this->makeCsvLineString(array_keys($line));
                $first = false;
            }
            $csv[] = $this->makeCsvLineString($line);
        }
        return response()->streamDownload(function () use ($csv) {
            echo implode("\n", $csv);
        }, $this->prospect->name . '.csv');
    }

    protected function makeCsvLine($data): array
    {
        if (!is_array($data)) {
            $data = json_decode($data, true);
        }
        return array_merge(
            [
                'first_name' => Arr::get($data, 'data.first_name', ''),
                'middle_initial' => Arr::get($data, 'data.middle_initial', ''),
                'middle_name' => Arr::get($data, 'data.middle_name', ''),
                'last_name' => Arr::get($data, 'data.last_name', ''),
                'gender' => Arr::get($data, 'data.gender', ''),
                'linkedin_url' => Arr::get($data, 'data.linkedin_url', ''),
                'work_email' => Arr::get($data, 'data.work_email', ''),
                'mobile_phone' => Arr::get($data, 'data.mobile_phone', ''),
                'industry' => Arr::get($data, 'data.industry', ''),
                'job_title' => Arr::get($data, 'data.job_title', ''),
                'job_title_role' => Arr::get($data, 'data.job_title_role', ''),
                'job_company_name' => Arr::get($data, 'data.job_company_name', ''),
                'job_company_website' => Arr::get($data, 'data.job_company_website', ''),
                'job_company_size' => Arr::get($data, 'data.job_company_size', ''),
                'job_company_industry' => Arr::get($data, 'data.job_company_industry', ''),
                'job_company_linkedin_url' => Arr::get($data, 'data.job_company_linkedin_url', ''),
                'job_company_location_name' => Arr::get($data, 'data.job_company_location_name', ''),
                'job_company_location_locality' => Arr::get($data, 'data.job_company_location_locality', ''),
                'job_company_location_region' => Arr::get($data, 'data.job_company_location_region', ''),
                'job_company_location_country' => Arr::get($data, 'data.job_company_location_country', ''),
                'job_company_location_continent' => Arr::get($data, 'data.job_company_location_continent', ''),
                'job_last_updated' => Arr::get($data, 'data.job_last_updated', ''),
                'job_start_date' => Arr::get($data, 'data.job_start_date', ''),
                'location_locality' => Arr::get($data, 'data.location_locality', ''),
                'location_region' => Arr::get($data, 'data.location_region', ''),
                'location_country' => Arr::get($data, 'data.location_country', ''),
                'location_continent' => Arr::get($data, 'data.location_continent', ''),
                'phone_numbers' => implode(",", Arr::get($data, 'data.phone_numbers', [])),
                'emails' => $this->makeEmails(Arr::get($data, 'data.emails', [])),
                'skills' => implode(",", Arr::get($data, 'data.skills', [])),

                'education_1_school_name' => Arr::get($data, 'data.education.0.school.name', ''),
                'education_1_school_type' => Arr::get($data, 'data.education.0.school.type', ''),
                'education_1_school_location' => Arr::get($data, 'data.education.0.school.location.name', ''),
                'education_1_degrees' => implode(",", Arr::get($data, 'data.education.0.degrees', [])),
                'education_1_majors' => implode(",", Arr::get($data, 'data.education.0.majors', [])),
                'education_1_minors' => implode(",", Arr::get($data, 'data.education.0.minors', [])),
                'education_1_start_date' => Arr::get($data, 'data.education.0.start_date', ''),
                'education_1_end_date' => Arr::get($data, 'data.education.0.end_date', ''),

                'education_2_school_name' => Arr::get($data, 'data.education.1.school.name', ''),
                'education_2_school_type' => Arr::get($data, 'data.education.1.school.type', ''),
                'education_2_school_location' => Arr::get($data, 'data.education.1.school.location.name', ''),
                'education_2_degrees' => implode(",", Arr::get($data, 'data.education.1.degrees', [])),
                'education_2_majors' => implode(",", Arr::get($data, 'data.education.1.majors', [])),
                'education_2_minors' => implode(",", Arr::get($data, 'data.education.1.minors', [])),
                'education_2_start_date' => Arr::get($data, 'data.education.1.start_date', ''),
                'education_2_end_date' => Arr::get($data, 'data.education.1.end_date', ''),

                'education_3_school_name' => Arr::get($data, 'data.education.2.school.name', ''),
                'education_3_school_type' => Arr::get($data, 'data.education.2.school.type', ''),
                'education_3_school_location' => Arr::get($data, 'data.education.2.school.location.name', ''),
                'education_3_degrees' => implode(",", Arr::get($data, 'data.education.2.degrees', [])),
                'education_3_majors' => implode(",", Arr::get($data, 'data.education.2.majors', [])),
                'education_3_minors' => implode(",", Arr::get($data, 'data.education.2.minors', [])),
                'education_3_start_date' => Arr::get($data, 'data.education.2.start_date', ''),
                'education_3_end_date' => Arr::get($data, 'data.education.2.end_date', ''),
            ],
            $this->addExperience(Arr::get($data, 'data.experience', []))
        );
    }

    protected function makeCsvLineString(array $line): string
    {
        return '"' . implode('","', $line) . '"';
    }

    protected function makeEmails($emails): string
    {
        if (!$emails) {
            return '';
        }
        if (!is_array($emails)) {
            return '';
        }
        $return = [];
        foreach ($emails as $email) {
            $return[] = Arr::get($email, 'address', '');
        }
        return implode(',', $return);
    }

    protected function addExperience(array $experience): array
    {
        $return = [];
        if (count($experience) >= 2) {
            usort($experience, function ($a, $b) {
                if ($a['is_primary'] === true && $b['is_primary'] !== true) {
                    return -1;
                }
                $aDate = $this->initDate($a['start_date']);
                $bDate = $this->initDate($b['start_date']);
                if ($aDate < $bDate) {
                    return 1;
                }
                return -1;
            });
        }
        foreach ($experience as $key => $job) {
            $return['experience_' . ($key + 1) . '_company_name'] = Arr::get($job, 'company.name', '');
            $return['experience_' . ($key + 1) . '_company_size'] = Arr::get($job, 'company.size', '');
            $return['experience_' . ($key + 1) . '_company_id'] = Arr::get($job, 'company.id', '');
            $return['experience_' . ($key + 1) . '_company_industry'] = Arr::get($job, 'company.industry', '');
            $return['experience_' . ($key + 1) . '_company_location_locality'] = Arr::get($job, 'company.location.locality', '');
            $return['experience_' . ($key + 1) . '_company_location_region'] = Arr::get($job, 'company.location.region', '');
            $return['experience_' . ($key + 1) . '_company_location_country'] = Arr::get($job, 'company.location.country', '');
            $return['experience_' . ($key + 1) . '_company_location_continent'] = Arr::get($job, 'company.location.continent', '');
            $return['experience_' . ($key + 1) . '_company_website'] = Arr::get($job, 'company.website', '');
            $return['experience_' . ($key + 1) . '_start_date'] = Arr::get($job, 'start_date', '');
            $return['experience_' . ($key + 1) . '_end_date'] = Arr::get($job, 'end_date', '');
            $return['experience_' . ($key + 1) . '_title_name'] = Arr::get($job, 'title.name', '');
            $return['experience_' . ($key + 1) . '_title_role'] = Arr::get($job, 'title.role', '');
            $return['experience_' . ($key + 1) . '_is_primary'] = Arr::get($job, 'is_primary', '');
        }
        return $return;
    }

    protected function initDate($date)
    {
        if (!$date) {
            $date = '1990-01-01';
        }
        $elements = explode('-', $date);
        if (count($elements) == 0) {
            $date = '1990-01-01';
        }
        if (count($elements) == 1) {
            $date .= '-01-01';
        }
        if (count($elements) == 2) {
            $date .= '-01';
        }
        return Carbon::createFromFormat('Y-m-d', $date);
    }
}
