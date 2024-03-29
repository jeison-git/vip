<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\PaymentPlatform;
use App\Models\Plan;
use App\Resolvers\PaymentPlatformResolver;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    protected $paymentPlatformResolver;

    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        $this->middleware(['auth','verified']);/* 'unsubscribed' */

        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }

    public function show()
    {
        $paymentPlatforms = PaymentPlatform::where('subscriptions_enabled', true)->get();

        return view('subscribe')->with([
            'plans' => Plan::all(),
            'paymentPlatforms' => $paymentPlatforms,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'plan' => ['required', 'exists:plans,slug'],
            'payment_platform' => ['required', 'exists:payment_platforms,id'],
        ];

        $request->validate($rules);

        $paymentPlatform = $this->paymentPlatformResolver
            ->resolveService($request->payment_platform);

        session()->put('subscriptionPlatformId', $request->payment_platform);

        return $paymentPlatform->handleSubscription($request);
    }

    public function approval(Request $request)
    {
        $rules = [
            'plan' => ['required', 'exists:plans,slug']
        ];

        $request->validate($rules);

        if (session()->has('subscriptionPlatformId')) {
            $paymentPlatform = $this->paymentPlatformResolver
                ->resolveService(session()->get('subscriptionPlatformId'));

            if ($paymentPlatform->validateSubscription($request)) {
                $plan = Plan::where('slug', $request->plan)->firstOrFail();
                $user = $request->user();

                $subscription = Subscription::create([
                    'active_until' => now(),
                    'user_id' => $user->id,
                    'plan_id' => $plan->id,
                ]);

                $mensaje = "Gracias, $user->name. Tienes una suscripción a $plan->slug. Activa tu credencial y empieza a usarlo.";

                session()->flash('flash.banner', $mensaje);
                return redirect()->route('profile.show'); 
                    /* ->withSuccess(['payment' => "Thanks, {$user->name}. You have a {$plan->slug} subscription. Start using it."]); */
            }


        }

        return redirect()
            ->route('subscribe.show')
            ->withErrors(['message'=>'We cannot check your subscription. Try again, please.']);

    }

    public function cancelled()
    {
        return redirect()
            ->route('subscribe.show')
            ->withErrors(['message'=>'You cancelled. Comeback whenever you\'re ready :)']);
    }
}
