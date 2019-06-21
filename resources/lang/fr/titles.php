<?php
use Stichoza\GoogleTranslate\TranslateClient;
    $translator = new TranslateClient('en', 'fr');
return [
    //owner
    'myClinic' => $translator->translate('List Of My Clinics'),
    'listDoctor' => $translator->translate('List Of All Doctor'),
    'addClinic' => $translator->translate('Create A New Clinic'),
    'noClinic' => $translator->translate('You Have No Clinic To Show'),
    'editClinic' => $translator->translate('Edit Information About :clinicName'),
    'manageClinic' => $translator->translate('Manage Your Clinic Pepole'),
    'addNurse' => $translator->translate('Add New Nurse'),
    'addOffer' => $translator->translate('Add New Offer'),
    //doctor
    'listOffer' => $translator->translate('List Of All Offers For You'),
    'noOffer' => $translator->translate('You Have No Offers To Show !!'),
    'confirmOffer' => $translator->translate('Confirm This Offer From :clinicName'),
    'confirmOfferBigNote' => $translator->translate('Fill Out Your Work Time Over One Week'),
    'confirmOfferSmallNote' => $translator->translate('Note: If you are check a day and dont fill out data of the day it will be set as defualt as a night duartion from 8pm to 10pm and 25 as number of patient.'),
    //nurse
    'addPatient' => $translator->translate('Add New Patient'),
    'reserveAppointment' => $translator->translate('Reserve An Appointment For Patient'),
    'timeTable' => $translator->translate('Time Table For Clinic'),
    'listReservation' => $translator->translate('List All Reservation In The Clinic'),
    'noAppointment' => $translator->translate('No Appointment To Show'),

    //public
    'searchResult' => $translator->translate('Search Result'),
];
