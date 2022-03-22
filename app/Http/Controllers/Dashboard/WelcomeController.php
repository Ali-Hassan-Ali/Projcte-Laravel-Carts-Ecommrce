<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliant;

use App\Models\Product;
use App\Models\Sub_Category;
use App\Models\Parent_Category;
use App\Models\CartStore;
use App\Models\Market;
use App\Models\Cupon;
use App\Models\GenerateCart;
use App\Models\HowUse;
// use App\Models\Purchase;
use App\Models\SupportCart;

use App\Models\HolidayMessage;
use App\Models\SmartEmail;
use App\Models\MonthlyMessage;

use App\Models\Usage_Policy;
use App\Models\ReturnPolicy;
use App\Models\PrivacyPolicy;
use App\Models\ContactUs;
use App\Models\CommonQuestions;
use App\Models\AbouUs;

class WelcomeController extends Controller
{

    public function __construct()
    {
        // create read update delete
        $this->middleware(['permission:dashboard_read'])->only('index');
    }//end of constructor

    public function index()
    {
        $users_count            = User::whereRoleIs('admin')->count();
        $Cliant_count           = Cliant::count();

        $Product_count          = Product::count();
        $sub_categoryegory_count= sub_category::count();
        $parent_category_count  = Parent_Category::count();
        $CartStore_count        = CartStore::count();
        $Market_count           = Market::count();
        $cupon_count            = cupon::count();
        $GenerateCart_count     = GenerateCart::count();
        $HowUse_count           = HowUse::count();
        // $Purchase_count         = Purchase::count();
        $SupportCart_count      = SupportCart::count();

        $HolidayMessage_count   = HolidayMessage::count();
        $SmartEmail_count       = SmartEmail::count();
        $MonthlyMessage_count   = MonthlyMessage::count();

        $Usage_Policy_count     = Usage_Policy::count();
        $ReturnPolicy_count     = ReturnPolicy::count();
        $PrivacyPolicy_count    = PrivacyPolicy::count();
        $ContactUs_count        = ContactUs::count();
        $ComQuest_count         = CommonQuestions::count();
        $AbouUs_count           = AbouUs::count();
    	return view('dashboard.welcome',
            compact('users_count','Cliant_count','Product_count','sub_categoryegory_count','parent_category_count','CartStore_count',
                'Market_count','cupon_count','GenerateCart_count','HowUse_count','SupportCart_count',
                'HolidayMessage_count','SmartEmail_count','MonthlyMessage_count','Usage_Policy_count','ReturnPolicy_count',
                'PrivacyPolicy_count','ContactUs_count','ComQuest_count','AbouUs_count'));
    }//end of index

}//end of controller dashboard
