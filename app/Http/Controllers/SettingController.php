<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index', [
            'title' => 'Setting',
            'setting' => Setting::first(),
        ]);
    }

    public function update(Request $request, Setting $setting)
    {
        $validated = $request->validate([
            'app_name' => 'required|string|max:255',
            'login_title' => 'required|string|max:255',
            'copyright' => 'required|string|max:255',
            'keywoards' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        DB::beginTransaction();

        try {

            if ($request->hasFile('logo')) {

                if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                    Storage::disk('public')->delete($setting->logo);
                }

                $validated['logo'] = $request->file('logo')->store('logo', 'public');
            }

            $setting->update($validated);

            DB::commit();

            return redirect()
                ->route('setting.index')
                ->with('success', 'Data berhasil disimpan');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }
}