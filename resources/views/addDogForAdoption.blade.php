@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="container alert">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{$message}}
                    </div>
                @endif
            </div>
            <div class="card">
               

                <div class="card-header">{{ __('Add a dog for adoption') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('dogs.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <label for="image"style=" cursor:pointer; color:#adacac"><i class="fa-solid fa-cloud-arrow-up"></i> Choose a photo of your dog</label>
                                <input id="image" type="file" style="display:none ; visibility:none;" name="image" accept="image/*" required autofocus>
                                <div class="display"></div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Age') }} year(s)</label>
                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('Weight') }} (Kg)</label>

                            <div class="col-md-6">
                                <input id="weight" type="number" step="0.1" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight') }}" required autocomplete="weight">

                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="breed" class="col-md-4 col-form-label text-md-end">{{ __('Breed') }}</label>
                            
                            <div class="col-md-6">
                                <select class="form-control @error('breed') is-invalid @enderror" id="breed" name="breed" required>
                                    <option value="Unknown">-- Unknown --</option>
                                    <option value="Afghan">Afghan</option>
                                    <option value="African Wild Dog">African Wild Dog</option>
                                    <option value="Airedale">Airedale</option>
                                    <option value="American Hairless">American Hairless</option>
                                    <option value="American spaniel">American spaniel</option>
                                    <option value="Basenji">Basenji</option>
                                    <option value="Basset">Basset</option>
                                    <option value="Beagle">Beagle</option>
                                    <option value="Breaded Collie">Breaded Collie</option>
                                    <option value="Bermaise">Bermaise</option>
                                    <option value="Bichon frise">Bichon frise</option>
                                    <option value="Blenheim">Blenheim</option>
                                    <option value="Bloodhound">Bloodhound</option>
                                    <option value="Bluetick">Bluetick</option>
                                    <option value="Border Collie">Border Collie</option>
                                    <option value="Borzoi">Borzoi</option>
                                    <option value="Boston Terrier">Boston Terrier</option>
                                    <option value="Boxer">Boxer</option>
                                    <option value="Bull Mastiff">Bull Mastiff</option>
                                    <option value="Bull Terrier">Bull Terrier</option>
                                    <option value="Bulldog">Bulldog</option>
                                    <option value="Cairn">Cairn</option>
                                    <option value="Chihuahua">Chihuahua</option>
                                    <option value="Chinese Crested">Chinese Crested</option>
                                    <option value="Chow">Chow</option>
                                    <option value="Clumber">Clumber</option>
                                    <option value="Cockapoo">Cockapoo</option>
                                    <option value="Cocker">Cocker</option>
                                    <option value="Collie">Collie</option>
                                    <option value="Corgi">Corgi</option>
                                    <option value="Coyote">Coyote</option>
                                    <option value="Dalmation">Dalmation</option>
                                    <option value="Dhole">Dhole</option>
                                    <option value="Dingo">Dingo</option>
                                    <option value="Doberman">Doberman</option>
                                    <option value="Elk Hound">Elk Hound</option>
                                    <option value="Frensh Bulldog">Frensh Bulldog</option>
                                    <option value="German Sheperd">German Sheperd</option>
                                    <option value="Golden Retriever">Golden Retriever</option>
                                    <option value="Great Dane">Great Dane</option>
                                    <option value="Great Pereness">Great Pereness</option>
                                    <option value="Greyhound">Greyhound</option>
                                    <option value="Groenendael">Groenendael</option>
                                    <option value="Irish Spaniel">Irish Spaniel</option>
                                    <option value="Irish Wolfhound">Irish Wolfhound</option>
                                    <option value="Japenese Spaniel">Japenese Spaniel</option>
                                    <option value="Komondor">Komondor</option>
                                    <option value="Labradoodle">Labradoodle</option>
                                    <option value="Labrador">Labrador</option>
                                    <option value="Lhasa">Lhasa</option>
                                    <option value="Malinois">Malinois</option>
                                    <option value="Maltese">Maltese</option>
                                    <option value="Mex Hairless">Mex Hairless</option>
                                    <option value="Newfoundland">Newfoundland</option>
                                    <option value="Pekinese">Pekinese</option>
                                    <option value="Pit Bull">Pit Bull</option>
                                    <option value="Pomeranian">Pomeranian</option>
                                    <option value="Poodle">Poodle</option>
                                    <option value="Pug">Pug</option>
                                    <option value="Rhodesian">Rhodesian</option>
                                    <option value="Rottweiler">Rottweiler</option>
                                    <option value="Saint Bernard">Saint Bernard</option>
                                    <option value="Schnauzer">Schnauzer</option>
                                    <option value="Scotch Terrier">Scotch Terrier</option>
                                    <option value="Shar_Pei">Shar_Pei</option>
                                    <option value="Shiba Inu">Shiba Inu</option>
                                    <option value="Shih-Tzu">Shih-Tzu</option>
                                    <option value="siberian Husky">siberian Husky</option>
                                    <option value="Vizsla">Vizsla</option>
                                    <option value="Yorkie">Yorkie</option>
                                </select>
                                @error('breed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="male" type="radio" value="Male" class="custom-control-input" name="gender" required>
                                    <label class="custom-control-label" for="male">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="female" type="radio" value="Female" class="custom-control-input" name="gender" required>
                                    <label class="custom-control-label" for="female">Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="vaccinated" class="col-md-4 col-form-label text-md-end">{{ __('Vaccinated') }}</label>

                            <div class="col-md-6">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="vaccinatedYes" type="radio" value="Yes" class="custom-control-input" name="vaccinated" required>
                                    <label class="custom-control-label" for="vaccinatedYes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input id="vaccinatedNo" type="radio" value="No" class="custom-control-input" name="vaccinated" required>
                                    <label class="custom-control-label" for="vaccinatedNo">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" aria-label="description" name="description"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const display = document.querySelector(".display");
    const input = document.querySelector("#image");
    let img = document.querySelector("img");

    input.addEventListener("change", () => {
        let reader = new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.addEventListener("load", () => {
            display.innerHTML = `<img src=${reader.result} alt=''/>`;
        });
    });
</script>
@endsection
