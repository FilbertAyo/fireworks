<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What types of events do you support?',
                'answer' => 'We design and execute displays for weddings, corporate launches, festivals, sporting events, private parties, and national celebrations. Each show is customized to the venue, audience, and storytelling goals.',
            ],
            [
                'question' => 'How far in advance should I book?',
                'answer' => 'For major events we recommend securing your date 6–8 weeks in advance to allow time for permits and design. Smaller private shows can often be scheduled within 2–3 weeks, subject to availability.',
            ],
            [
                'question' => 'Do you handle permits and safety?',
                'answer' => 'Absolutely. Our team manages site inspections, municipal permits, insurance coverage, and comprehensive safety plans. All technicians are certified and follow international pyrotechnic standards.',
            ],
            [
                'question' => 'Can you synchronize fireworks with music?',
                'answer' => 'Yes! We specialize in pyromusical shows. Share your soundtrack—or we’ll help curate one—and our designers will program effects to match every beat and crescendo.',
            ],
            [
                'question' => 'What happens if the weather changes?',
                'answer' => 'Safety always comes first. We monitor conditions leading up to your event and have contingency plans, including rescheduling, alternative effects, or partial adjustments when wind or rain makes fireworks unsafe.',
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                ['answer' => $faq['answer'], 'is_active' => true],
            );
        }
    }
}


