<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;

class DogDiseaseConversation extends Conversation
{
    protected $diseases = [
        'parvovirus' => ['The symptoms of parvovirus include vomiting, diarrhea, and fever. It is important to take your dog to the vet as soon as possible for treatment.', 'Parvovirus can be prevented with a vaccine. Talk to your vet about vaccination options.'],
        'distemper' => ['The symptoms of distemper include fever, coughing, and discharge from the eyes and nose. Treatment involves supportive care and medications.', 'Distemper is highly contagious, so it is important to keep your dog away from infected animals.'],
        'kennel cough' => ['Kennel cough is a highly contagious respiratory disease that can be caused by several different viruses and bacteria. Treatment involves supportive care and antibiotics.', 'The best way to prevent kennel cough is to vaccinate your dog and avoid exposing them to infected animals.'],
        'heartworm' => ['Heartworm is a parasitic disease that can cause serious damage to a dog\'s heart and lungs. Treatment involves medication and sometimes surgery.', 'Heartworm can be prevented with a monthly medication that kills the larvae before they mature. Talk to your vet about prevention options.'],
        'lyme disease' => ['Symptoms of Lyme disease in dogs include fever, loss of appetite, lethargy, and joint pain. Treatment involves antibiotics. This disease is transmitted through tick bites, so it\'s important to check your dog for ticks after being outdoors.', 'Prevention involves tick control and vaccination in some cases. Talk to your vet for more information.'],
        'canine influenza' => ['Symptoms of canine influenza include coughing, sneezing, and fever. Treatment involves supportive care and sometimes antibiotics. This disease is highly contagious, so it\'s important to keep your dog away from infected animals.', 'Vaccination is available for some strains of canine influenza. Talk to your vet for more information.'],
        'canine parainfluenza' => ['Symptoms of canine parainfluenza include coughing, sneezing, and discharge from the eyes and nose. Treatment involves supportive care and sometimes antibiotics. This disease is highly contagious, so it\'s important to keep your dog away from infected animals.', 'Prevention involves vaccination. Talk to your vet for more information.'],
        'canine coronavirus' => ['Symptoms of canine coronavirus include vomiting, diarrhea, and loss of appetite. Treatment involves supportive care and sometimes medications. This disease is highly contagious, so it\'s important to keep your dog away from infected animals.', 'Prevention involves vaccination in some cases. Talk to your vet for more information.'],
        'rabies' => ['Symptoms of rabies in dogs can include behavioral changes, fever, and paralysis. There is no cure for rabies, so it\'s important to vaccinate your dog and avoid exposure to potentially infected animals.', 'Prevention involves vaccination and avoiding contact with wild animals. Talk to your vet for more information.']

    ];

    public function askDisease()
    {
        $question = Question::create("What dog disease would you like information about?")
            ->fallback('Sorry, I could not understand your request')
            ->callbackId('ask_disease');

        foreach ($this->diseases as $disease => $info) {
            $question->addButton($disease, $disease);
        }

        $this->ask($question, function (Answer $answer) {
            $disease = $answer->getValue();

            if (isset($this->diseases[$disease])) {
                $info = $this->diseases[$disease];
                $this->say($info[0]);
                $this->say($info[1]);
            } else {
                $this->say("I'm sorry, I don't have information on that disease.");
            }
        });
    }

    public function run()
    {
        $this->askDisease();
    }
}