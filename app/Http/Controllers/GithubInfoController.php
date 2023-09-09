<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// For Date and time Manipulation
use Carbon\Carbon; 

class GithubInfoController extends Controller
{
    public function index(Request $request){


        // Fetch Query Parameters
        $slackName = $request->input('slack_name', 'Greegman');
        $track = $request->input('track', 'Backend');

        // Get Current Day of the week
        $currentDay = Carbon::now()->format('l');
        $currentUtcTime = Carbon::now('UTC');
        
        // Define GitHub URLs
        $githubFileUrl = 'https://github.com/username/repo/blob/main/file_name.ext';
        $githubRepoUrl = 'https://github.com/DGreegman/stage-one';

        // Build the response JSON
        $response = [
            'slack_name' => $slackName,
            'current_day' => $currentDay,
            'utc_time' => $currentUtcTime->toIso8601String(),
            'track' => $track,
            'github_file_url' => $githubFileUrl,
            'github_repo_url' => $githubRepoUrl,
            'status_code' => 200,
        ];

        return response()->json($response);
    }
}
