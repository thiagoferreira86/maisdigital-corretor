<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Lead;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::all();
        return $this->view('lead/index', ['leads' => $leads]);
    }

    public function show($id)
    {
        $lead = Lead::findById($id);
        return $this->view('lead/show', ['lead' => $lead]);
    }
}
