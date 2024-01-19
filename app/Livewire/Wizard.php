<?php
// app/Livewire/Wizard.php

namespace App\Livewire;

use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Skill;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Wizard extends Component
{
    use WithFileUploads;
    public $currentStep = 1;
    public $successMessage = '';
    public $skills = [];

    // Add the new properties based on the $fillable attributes
    public
        $file,
        $file_original_name,
        $title,
        $scope,
        $duration,
        $experience,
        $is_full_time,
        $budget_type,
        $amount,
        $description;

    public function render()
    {
        $allSkills = Skill::all();

        return view('livewire.wizard', compact('allSkills'));
    }

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'title' => 'required|string'
        ]);
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        // Adjust the validation rules based on your requirements
        $validatedData = $this->validate([
            'skills' => 'required|array|min:1',
            'skills.*' => 'exists:skills,id',
        ]);

        $this->currentStep = 3;
    }
    public function thridStepSubmit()
    {
        // Adjust the validation rules based on your requirements
        $validatedData = $this->validate([
            'scope' => 'required|string',
            'scope' => 'in:small,medium,large',
            'duration' => 'required|numeric',
            'duration' => 'in:1,3,6',
            'experience' => 'reqired|numeric',
            'experience' => 'in:0, 1, 2',
            'is_full_time' => 'in:0, 1'
        ]);

        $this->currentStep = 4;
    }
    public function fourthStepSubmit()
    {
        $validatedData = $this->validate([
            'budget_type' => 'required|boolean',
            'amount' => 'required|numeric'
        ]);
        $this->currentStep = 5;
    }
    public function fivethStepSubmit()
    {
        $validatedData = $this->validate([
            'description' => 'required|string|min:50|max:255',
            'file' => 'required|file|mimes:jpg,img,image,pdf|max:10000'
        ]);
        $this->currentStep = 6;
    }

    public function submitForm()
    {
        if ($this->file) {
            $fileName =  Str::random(5) . $this->file->getClientOriginalName();
            $uploadedFile = $this->file->storeAs('files', $fileName);
            $filePath = storage_path('app/' . $uploadedFile);
        }

        Post::create([
            'title' => $this->title,
            'amount' => $this->amount,
            'description' => $this->description,
            'file' => $uploadedFile,
            'file_original_name' => $this->file->getClientOriginalName(),
            'title' => $this->title,
            'scope' => $this->scope,
            'duration' => $this->duration,
            'is_full_time' => $this->is_full_time,
            'budget_type' => $this->budget_type,
        ]);

        $this->successMessage = 'Product Created Successfully.';

        $this->clearForm();

        $this->currentStep = 1;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function clearForm()
    {
        $this->title = '';
        $this->budget_type = '';
        $this->amount = '';
        $this->file = '';
        $this->file_original_name = '';
        $this->scope = '';
        $this->duration = '';
        $this->is_full_time = '';
        $this->experience = '';
        $this->description = '';
    }
}
