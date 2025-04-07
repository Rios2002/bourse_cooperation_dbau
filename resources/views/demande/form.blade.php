<div class="">
    <div class="row">

        {{-- <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="bourse_id" class="form-label">{{ __('Bourse Id') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="bourse_id" class="form-control @error('bourse_id') is-invalid @enderror rounded-05"
                value="{{ old('bourse_id', $demande?->bourse_id) }}" id="bourse_id">
            {!! $errors->first('bourse_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="user_id" class="form-label">{{ __('User Id') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror rounded-05"
                value="{{ old('user_id', $demande?->user_id) }}" id="user_id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="code" class="form-label">{{ __('Code') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Code" class="form-control @error('Code') is-invalid @enderror rounded-05"
                value="{{ old('Code', $demande?->Code) }}" id="code">
            {!! $errors->first('Code', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}


        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="n_p_i" class="form-label">{{ __('Npi') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="NPI" class="form-control @error('NPI') is-invalid @enderror rounded-05"
                value="{{ old('NPI', $demande?->NPI) }}" id="n_p_i">
            {!! $errors->first('NPI', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="nom" class="form-label">{{ __('Nom') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Nom" class="form-control @error('Nom') is-invalid @enderror rounded-05"
                value="{{ old('Nom', $demande?->Nom) }}" id="nom">
            {!! $errors->first('Nom', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="prenom" class="form-label">{{ __('Prenom') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Prenom" class="form-control @error('Prenom') is-invalid @enderror rounded-05"
                value="{{ old('Prenom', $demande?->Prenom) }}" id="prenom">
            {!! $errors->first('Prenom', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="date_naissance" class="form-label">{{ __('Datenaissance') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="date" name="DateNaissance"
                class="form-control @error('DateNaissance') is-invalid @enderror rounded-05"
                value="{{ old('DateNaissance', $demande?->DateNaissance->format('Y-m-d')) }}" id="date_naissance">
            {!! $errors->first(
                'DateNaissance',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="lieu_naissance" class="form-label">{{ __('Lieunaissance') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="LieuNaissance"
                class="form-control @error('LieuNaissance') is-invalid @enderror rounded-05"
                value="{{ old('LieuNaissance', $demande?->LieuNaissance) }}" id="lieu_naissance">
            {!! $errors->first(
                'LieuNaissance',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="sexe" class="form-label">{{ __('Sexe') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Sexe" class="form-control @error('Sexe') is-invalid @enderror rounded-05"
                value="{{ old('Sexe', $demande?->Sexe) }}" id="sexe">
            {!! $errors->first('Sexe', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="code_diplome" class="form-label">{{ __('Codediplome') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="CodeDiplome"
                class="form-control @error('CodeDiplome') is-invalid @enderror rounded-05"
                value="{{ old('CodeDiplome', $demande?->CodeDiplome) }}" id="code_diplome">
            {!! $errors->first('CodeDiplome', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>


        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="serie_ou_filiere_base" class="form-label">{{ __('Serieoufilierebase') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="SerieOuFiliereBase"
                class="form-control @error('SerieOuFiliereBase') is-invalid @enderror rounded-05"
                value="{{ old('SerieOuFiliereBase', $demande?->SerieOuFiliereBase) }}" id="serie_ou_filiere_base">
            {!! $errors->first(
                'SerieOuFiliereBase',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="annee_obtention" class="form-label">{{ __('Anneeobtention') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="AnneeObtention"
                class="form-control @error('AnneeObtention') is-invalid @enderror rounded-05"
                value="{{ old('AnneeObtention', $demande?->AnneeObtention) }}" id="annee_obtention">
            {!! $errors->first(
                'AnneeObtention',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="moyenne" class="form-label">{{ __('Moyenne') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Moyenne" class="form-control @error('Moyenne') is-invalid @enderror rounded-05"
                value="{{ old('Moyenne', $demande?->Moyenne) }}" id="moyenne">
            {!! $errors->first('Moyenne', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="mention" class="form-label">{{ __('Mention') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Mention" class="form-control @error('Mention') is-invalid @enderror rounded-05"
                value="{{ old('Mention', $demande?->Mention) }}" id="mention">
            {!! $errors->first('Mention', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="cycle_sollicite" class="form-label">{{ __('Cyclesollicite') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="CycleSollicite"
                class="form-control @error('CycleSollicite') is-invalid @enderror rounded-05"
                value="{{ old('CycleSollicite', $demande?->CycleSollicite) }}" id="cycle_sollicite">
            {!! $errors->first(
                'CycleSollicite',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>




        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="filiere_manuel" class="form-label">{{ __('Filieremanuel') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="FiliereManuel"
                class="form-control @error('FiliereManuel') is-invalid @enderror rounded-05"
                value="{{ old('FiliereManuel', $demande?->FiliereManuel) }}" id="filiere_manuel">
            {!! $errors->first(
                'FiliereManuel',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="filiere_id" class="form-label">{{ __('Filiere Id') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="filiere_id"
                class="form-control @error('filiere_id') is-invalid @enderror rounded-05"
                value="{{ old('filiere_id', $demande?->filiere_id) }}" id="filiere_id">
            {!! $errors->first('filiere_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="libelle_filiere" class="form-label">{{ __('Libellefiliere') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="LibelleFiliere"
                class="form-control @error('LibelleFiliere') is-invalid @enderror rounded-05"
                value="{{ old('LibelleFiliere', $demande?->LibelleFiliere) }}" id="libelle_filiere">
            {!! $errors->first(
                'LibelleFiliere',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="statut_allocataire" class="form-label">{{ __('Statutallocataire') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="StatutAllocataire"
                class="form-control @error('StatutAllocataire') is-invalid @enderror rounded-05"
                value="{{ old('StatutAllocataire', $demande?->StatutAllocataire) }}" id="statut_allocataire">
            {!! $errors->first(
                'StatutAllocataire',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="contact" class="form-label">{{ __('Contact') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Contact"
                class="form-control @error('Contact') is-invalid @enderror rounded-05"
                value="{{ old('Contact', $demande?->Contact) }}" id="contact">
            {!! $errors->first('Contact', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="contact_parent" class="form-label">{{ __('Contactparent') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="ContactParent"
                class="form-control @error('ContactParent') is-invalid @enderror rounded-05"
                value="{{ old('ContactParent', $demande?->ContactParent) }}" id="contact_parent">
            {!! $errors->first(
                'ContactParent',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        {{-- <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="depot_physique" class="form-label">{{ __('Depotphysique') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="DepotPhysique"
                class="form-control @error('DepotPhysique') is-invalid @enderror rounded-05"
                value="{{ old('DepotPhysique', $demande?->DepotPhysique) }}" id="depot_physique">
            {!! $errors->first(
                'DepotPhysique',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="statut_traitement" class="form-label">{{ __('Statuttraitement') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="StatutTraitement"
                class="form-control @error('StatutTraitement') is-invalid @enderror rounded-05"
                value="{{ old('StatutTraitement', $demande?->StatutTraitement) }}" id="statut_traitement">
            {!! $errors->first(
                'StatutTraitement',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div> --}}
        <div class="col-lg-6 form-group mb-2 mb20">
            <strong> <label for="observation" class="form-label">{{ __('Observation') }}</label>
                <!-- <strong class="text-danger"> * </strong> --> </strong>
            <input type="text" name="Observation"
                class="form-control @error('Observation') is-invalid @enderror rounded-05"
                value="{{ old('Observation', $demande?->Observation) }}" id="observation">
            {!! $errors->first('Observation', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-success rounded-1">Enregistrer</button>
    </div>
</div>
