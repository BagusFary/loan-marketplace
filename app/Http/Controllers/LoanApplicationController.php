<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Interest;
use Illuminate\Http\Request;
use App\Models\LoanApplication;
use Illuminate\Support\Facades\Auth;

class LoanApplicationController extends Controller
{

    public function index()
    {
        $loan_application = LoanApplication::where('user_id', Auth::user()->id)->paginate(5);

        return view('form.index', [
            'loan_application' => $loan_application
        ]);
    }

    public function create()
    {
        $interest = Interest::with('lender')->get();
        return view('form.create', [
            'interest' => $interest
        ]);
    }

    public function store(Request $request)
    {
        $request['user_id'] = Auth::user()->id;
        $loan = LoanApplication::create($request->all());

        if ($loan) {

            session()->flash('success', 'Loan Successfully Added!');
            return redirect()->route('dashboard.list-application');
        } else {

            session()->flash('error', 'Failed to save Loan, Try Again');
        }
    }

    public function offer($id)
    {
        $loan = LoanApplication::with('offers:id,loan_id,interest_id')
            ->where('id', $id)
            ->first();

        if ($loan->offers) {
            $excludedOffers = $loan->offers->pluck('interest_id');
        } else {
            $excludedOffers = collect();
        }


        $interests = Interest::with('lender')
            ->where('tenor', $loan->tenor)
            ->whereNotIn('id', $excludedOffers)
            ->paginate(10);


        $offers = Offer::with([
            'lender:id,company_name',
            'interest:id,tenor,interest_rate'
        ])
            ->where('loan_id', $id)
            ->paginate(10);



        return view('form.offerPage', [
            "loan" => $loan,
            "interests" => $interests,
            "offers" => $offers
        ]);
    }

    public function storeOffer(Request $request)
    {


        $amount = (float) $request['amount'];
        $interestRate = (float) $request['interest_rate'];

        $interest = $amount * ($interestRate / 100);

        $totalRepayment = $amount + $interest;

        $offer = Offer::create([
            "loan_id" => $request['loan_id'],
            "lender_id" => $request['lender_id'],
            "interest_id" => $request['interest_id'],
            "total_repayment" => $totalRepayment,
            "status" => "pending"
        ]);

        if($offer){

            session()->flash('success', "Offer Successfully Requested!");
            return back();

        } else {

            session()->flash('error', "Failed Request Offer to Lender");
            return back();

        }
    }
}
