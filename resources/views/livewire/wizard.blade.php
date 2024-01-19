<div>
    @if (!empty($successMessage))
        <div class="alert alert-success">
            {{ $successMessage }}
        </div>
    @endif

    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button"
                    class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Step 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button"
                    class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Step 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button"
                    class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">3</a>
                <p>Step 3</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button"
                    class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}">4</a>
                <p>Step 4</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button"
                    class="btn btn-circle {{ $currentStep != 5 ? 'btn-default' : 'btn-primary' }}">5</a>
                <p>Step 5</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-6" type="button"
                    class="btn btn-circle {{ $currentStep != 6 ? 'btn-default' : 'btn-primary' }}">6</a>
                <p>Step 6</p>
            </div>
        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 1</h3>

                <div class="form-group">
                    <label for="title">job title:</label>
                    <input type="text" wire:model="title" class="form-control" id="taskTitle">
                    @error('title')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                    type="button">Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                @if ($currentStep === 2)
                    <div>
                        <h3> Step 2</h3>
                        <label for="skills">Select Skills:</label>
                        <select wire:model="skills" multiple>
                            @foreach ($allSkills as $skill)
                                <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                            @endforeach
                        </select>

                        @error('skills')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                @endif

                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                    wire:click="back(1)">Back</button>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                    wire:click="secondStepSubmit">Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12">


                <div class="form-group">
                    <label for="description">Define project scale</label><br />
                    <label class="radio-inline"><input type="radio" wire:model="scope" value="small"> Small</label>
                    <label class="radio-inline"><input type="radio" wire:model="scope" value="medium"> Medium</label>
                    <label class="radio-inline"><input type="radio" wire:model="scope" value="large"> Large</label>
                    @error('scope')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">How long will your work take?</label><br />
                    <label class="radio-inline"><input type="radio" wire:model="duration" value="1"> 1 to 3
                        months</label>
                    <label class="radio-inline"><input type="radio" wire:model="duration" value="3"> 3 to 6
                        months</label>
                    <label class="radio-inline"><input type="radio" wire:model="duration" value="6"> More than 6
                        months</label>
                    @error('duration')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">What level of experience will it need?</label><br />
                    <label class="radio-inline"><input type="radio" wire:model="experience" value="0">
                        Entry</label>
                    <label class="radio-inline"><input type="radio" wire:model="experience" value="1">
                        Intermediate</label>
                    <label class="radio-inline"><input type="radio" wire:model="experience" value="2">
                        Expert</label>
                    @error('experience')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="is_full_time">Is this job a contract-to-hire opportunity?</label><br />
                    <label class="radio-inline"><input type="radio" wire:model="is_full_time" value="1"> Yes
                        it may full time</label>
                    <label class="radio-inline"><input type="radio" wire:model="is_full_time" value="0">
                        Definetely no, it is part time</label>
                    @error('is_full_time')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                    wire:click="back(2)">Back</button>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                    wire:click="thridStepSubmit">Next</button>
            </div>
        </div>
    </div>

    <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="form-group">

                    <label for="budget_type">Tell us about your budget.</label>
                    <label class="radio-inline"><input type="radio" wire:model="budget_type" value="1">
                        Houry</label>
                    <label class="radio-inline"><input type="radio" wire:model="budget_type" value="0"> Fixed
                        Price</label>
                    @error('budget_type')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <input type="number" step="any" placeholder="$15" wire:model="amount" class="form-control"
                        id="amount">
                    @error('amount')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                    wire:click="back(3)">Back</button>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                    wire:click="fourthStepSubmit">Next</button>
            </div>
        </div>
    </div>


    <div class="row setup-content {{ $currentStep != 5 ? 'displayNone' : '' }}" id="step-5">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Step 1</h3>
                <form wire:submit.prevent="fivethStepSubmit">
                    <div class="form-group">
                        <textarea wire:model="description" name="description" id="description" cols="30" rows="10"
                            placeholder="Describe clearly about the project and try to provide information more specifically"></textarea>
                        @error('description')
                            <span class="error">{{ $message }}</span>
                        @enderror

                        <!-- Your form fields -->
                        <input type="file" name="file" accept=".jpg,.img,.image,.pdf" wire:model="file">
                        @error('file')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                    wire:click="back(4)">Back</button>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                    wire:click="fivethStepSubmit">Next</button>
            </div>
        </div>
    </div>



    <div class="row setup-content {{ $currentStep != 6 ? 'displayNone' : '' }}" id="step-6">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Review of job description</h3>

                <table class="table">
                    <tr>
                        <td>Title of job post.</td>
                        <td><strong>{{ $title }}</strong></td>
                    </tr>
                    <tr>
                        <td>File</td>
                        <td><strong>{{ $file }}</strong></td>
                    </tr>
                    <tr>
                        <td>Scope</td>
                        <td><strong>{{ $scope }}</strong></td>
                    </tr>
                    <tr>
                        <td>Duration</td>
                        <td><strong>










                                @if ($duration === 1)
                                    Expected duration 1 to 3 month
                                @elseif ($duration === 3)
                                    Expected duration 3 to 6 month
                                @else
                                    More than 6 month
                                @endif

                            </strong></td>
                    </tr>
                    <tr>
                        <td>Experience</td>
                        <td><strong>
                                @if ($experience === 0)
                                    Entery level satisfied
                                @elseif ($experience === 1)
                                    Middle level required
                                @else
                                    Expert level better
                                @endif
                            </strong></td>
                    </tr>
                    <tr>
                        {{ $is_full_time }}
                        <td>It miay become full time </td>
                        <td><strong>{{ $is_full_time != 1 ? 'not' : 'full time' }}</strong></td>
                    </tr>
                    <tr>
                        <td>Budget type</td>
                        <td><strong>{{ $budget_type != 1 ? 'flexible' : 'hourly' }}</strong></td>
                    </tr>
                    <tr>
                        <td>Budget amount</td>
                        <td><strong>{{ "$" . $amount }}</strong></td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td><strong>{{ $description }}</strong></td>
                    </tr>
                </table>


                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button"
                    wire:click="back(5)">Back</button>
                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm"
                    type="button">Finish!</button>
            </div>
        </div>
    </div>
</div>
