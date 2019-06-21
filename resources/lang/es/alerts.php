<?php
use Stichoza\GoogleTranslate\TranslateClient;
    $translator = new TranslateClient('en', 'es');
      
return [
    
    
    //TRUE ALERT

    //GREEN ALERT
    //add
    'addData' => $translator->translate('Data Added Successfuly'),
    'addPatient' => $translator->translate('Patient Added Successfuly'),
    'addNurse' => $translator->translate('Nurse Added Successfuly'),
    'sendOffer' => $translator->translate('Offer Send Successfuly'),
    'acceptOffer' => $translator->translate('Offer Accepted, Enjoy With New Jop'),
    'addClinic' => $translator->translate('Clinic Added Successfuly'),
    'addCv' => $translator->translate('CV Added Successfuly'),
    //update
    'saveData' => $translator->translate('Data Saved Successfuly'),
    'updateData' => $translator->translate('Data Updated Successfuly'),
    'updateClinic' => $translator->translate('Clinic Data Updated Successfuly'),
    'updateProfile' => $translator->translate('Profile Data Updated Successfuly'),
    'updateImage' => $translator->translate('Image Updated Successfuly'),
    'updateCv' => $translator->translate('CV Updated Successfuly'),
    'updatePassword' => $translator->translate('Password Updated Successfuly'),
    //delete
    'rejectOffer' => $translator->translate('Offer Has Been Rejected'),
    'deleteData' => $translator->translate('Data Deleted Successfuly'),

    //FALSE ALERT

    //RED ALERT
    //add
    'addData' => $translator->translate('Data Are Not Added Successfuly'),
    'addPatient' => $translator->translate('Patient Is Not Added Successfuly'),
    'addNurse' => $translator->translate('Nurse Is Not Added Successfuly'),
    'sendOffer' => $translator->translate('Offer Is Not Send Successfuly'),
    'acceptOffer' => $translator->translate('Offer Is Not Accepted, Enjoy With New Jop'),
    'addClinic' => $translator->translate('Clinic Is Not Added Successfuly'),
    'addCv' => $translator->translate('CV Is Not Added Successfuly'),
    //update
    'saveData' => $translator->translate('Data Are Not Saved Successfuly'),
    'updateData' => $translator->translate('Data Are Not Updated Successfuly'),
    'updateClinic' => $translator->translate('Clinic Data Are Not Updated Successfuly'),
    'updateProfile' => $translator->translate('Profile Data Are Not Updated Successfuly'),
    'updateImage' => $translator->translate('Image Is Not Updated Successfuly'),
    'updateCv' => $translator->translate('CV Is Not Updated Successfuly'),
    'updatePassword' => $translator->translate('Password Is Not Updated Successfuly'),
    //delete
    'rejectOffer' => $translator->translate('Offer Is Nor Rejected'),
    'deleteData' => $translator->translate('Data Are Not Deleted Successfuly'),


];
