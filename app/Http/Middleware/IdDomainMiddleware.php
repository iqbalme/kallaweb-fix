<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Prodi;

use App\Models\Setting;
use App\Models\Pendaftar;
use App\Models\PesertaEvent;
use App\Observers\PendaftarObserver;
use App\Observers\PesertaEventObserver;

class IdDomainMiddleware
{
    public $data;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $admin_utama = false;
        // $ids_role = [];
        // $current_user_roles = \Auth::user()->role_users;
        // foreach($current_user_roles as $current_role){
        //     $ids_role[] = $current_role->roles->id;
        // }
        // if(in_array(2, $ids_role)){
        //     $admin_utama = true;
        // }
        // $this->data['admin_utama'] = $admin_utama;
        $domainId = [];
        $pattern = '#(?:https?:\/\/)?([a-zA-Z0-9_-]+)?.?('.config('app.url').')#i'; //for production
        // $pattern = '#(?:https?:\/\/)?([a-zA-Z0-9_-]+)?.?(localhost.test)#i'; //for testing only
        preg_match($pattern, $request->fullUrl(), $domainId, PREG_UNMATCHED_AS_NULL);
        //dd($domainId);
        if(isset($domainId[1])){
            $prodi = Prodi::where('subdomain', $domainId[1])->where('id', '!=', 1);
            if($prodi->count()){
                //tambah new value untuk identifikasi subdomain
                $request->request->add(['is_main_domain' => false, 'subdomain' => $prodi->first(), 'main_domain' => $domainId[2]]);
                $this->inisiasi_layout_data();
                return $next($request);
            } else {
                abort(404);
            }
        } else {
            //domain utama
            //tambah new value untuk identifikasi domain utama
            $request->request->add(['is_main_domain' => true, 'subdomain' => null, 'main_domain' => $domainId[2]]);
            $this->inisiasi_layout_data();
            return $next($request);
        };
    }

    protected function inisiasi_layout_data(){
        $settings = Setting::all();
        $prodis = Prodi::all();
        foreach($settings as $setting){
            $this->data[$setting->nama_setting] = $setting->isi_setting;
        }
        $this->data['prodis'] = $prodis;
        
        view()->composer('components.admin-layout', function($view){ $view->with('data', $this->data); });
        view()->composer('components.sidebar', function($view){ $view->with('data', $this->data); });
        view()->composer('components.header', function($view){ $view->with('data', $this->data); });
        //view()->composer('components.footer', function($view){ $view->with('data', $this->data); });
        view()->composer('layouts.app', function($view){ $view->with('data', $this->data); });
        view()->composer('layouts.nav', function($view){ $view->with('data', $this->data); });
        view()->composer('layouts.footer', function($view){ $view->with('data', $this->data); });

        Pendaftar::observe(PendaftarObserver::class);
        PesertaEvent::observe(PesertaEventObserver::class);
    }
}
