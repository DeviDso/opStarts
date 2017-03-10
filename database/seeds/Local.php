<?php

use Illuminate\Database\Seeder;

class Local extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array[] = ['name' => 'Videography
'];
        $array[] = ['name' => 'Photography
'];
        $array[] = ['name' => 'Moving
'];
        $array[] = ['name' => 'Handyman
'];
        $array[] = ['name' => 'General Labor
'];
        $array[] = ['name' => 'Computer Help
'];
        $array[] = ['name' => 'Pickup
'];
        $array[] = ['name' => 'Delivery
'];
        $array[] = ['name' => 'Cleaning Domestic
'];
        $array[] = ['name' => 'Installation
'];
        $array[] = ['name' => 'Drafting
'];
        $array[] = ['name' => 'Kitchen
'];
        $array[] = ['name' => 'Extensions &amp; Additions
'];
        $array[] = ['name' => 'Painting
'];
        $array[] = ['name' => 'Building Designer
'];
        $array[] = ['name' => 'Financial Planning
'];
        $array[] = ['name' => 'Inspections
'];
        $array[] = ['name' => 'Event Staffing
'];
        $array[] = ['name' => 'Piping
'];
        $array[] = ['name' => 'Building Consultants
'];
        $array[] = ['name' => 'Electricians
'];
        $array[] = ['name' => 'Shopping
'];
        $array[] = ['name' => 'Cooking / Baking
'];
        $array[] = ['name' => 'Gardening
'];
        $array[] = ['name' => 'Lighting
'];
        $array[] = ['name' => 'Make Up
'];
        $array[] = ['name' => 'Packing &amp; Shipping
'];
        $array[] = ['name' => 'Sewing
'];
        $array[] = ['name' => 'Bathroom
'];
        $array[] = ['name' => 'Building
'];
        $array[] = ['name' => 'Clothesline
'];
        $array[] = ['name' => 'Furniture Assembly
'];
        $array[] = ['name' => 'Glass / Mirror &amp; Glazing
'];
        $array[] = ['name' => 'Home Organization
'];
        $array[] = ['name' => 'House Cleaning
'];
        $array[] = ['name' => 'Landscape Design
'];
        $array[] = ['name' => 'Landscaping
'];
        $array[] = ['name' => 'Appliance Installation
'];
        $array[] = ['name' => 'Bricklaying
'];
        $array[] = ['name' => 'Building Certifiers
'];
        $array[] = ['name' => 'Carpentry
'];
        $array[] = ['name' => 'Cement Bonding Agents
'];
        $array[] = ['name' => 'Commercial Cleaning
'];
        $array[] = ['name' => 'Concreting
'];
        $array[] = ['name' => 'Decoration
'];
        $array[] = ['name' => 'Excavation
'];
        $array[] = ['name' => 'Hair Styles
'];
        $array[] = ['name' => 'Housework
'];
        $array[] = ['name' => 'IKEA Installation
'];
        $array[] = ['name' => 'Interiors
'];
        $array[] = ['name' => 'Laundry and Ironing
'];
        $array[] = ['name' => 'Mortgage Brokering
'];
        $array[] = ['name' => 'Mural Painting
'];
        $array[] = ['name' => 'Sculpturing
'];
        $array[] = ['name' => 'Air Conditioning
'];
        $array[] = ['name' => 'Antenna Services
'];
        $array[] = ['name' => 'Appliance Repair
'];
        $array[] = ['name' => 'Asbestos Removal
'];
        $array[] = ['name' => 'Asphalt
'];
        $array[] = ['name' => 'Attic Access Ladders
'];
        $array[] = ['name' => 'Awnings
'];
        $array[] = ['name' => 'Balustrading
'];
        $array[] = ['name' => 'Bamboo Flooring
'];
        $array[] = ['name' => 'Brackets
'];
        $array[] = ['name' => 'Building Surveyors
'];
        $array[] = ['name' => 'Carpet Repair &amp; Laying
'];
        $array[] = ['name' => 'Carports
'];
        $array[] = ['name' => 'Carwashing
'];
        $array[] = ['name' => 'Ceilings
'];
        $array[] = ['name' => 'Cleaning Carpet
'];
        $array[] = ['name' => 'Cleaning Upholstery
'];
        $array[] = ['name' => 'Coating Materials
'];
        $array[] = ['name' => 'Columns
'];
        $array[] = ['name' => 'Courses
'];
        $array[] = ['name' => 'Damp Proofing
'];
        $array[] = ['name' => 'Decking
'];
        $array[] = ['name' => 'Demolition
'];
        $array[] = ['name' => 'Disposals
'];
        $array[] = ['name' => 'Drains
'];
        $array[] = ['name' => 'Equipment Hire
'];
        $array[] = ['name' => 'Fencing
'];
        $array[] = ['name' => 'Feng Shui
'];
        $array[] = ['name' => 'Floor Coatings
'];
        $array[] = ['name' => 'Flooring
'];
        $array[] = ['name' => 'Flyscreens
'];
        $array[] = ['name' => 'Food Takeaway
'];
        $array[] = ['name' => 'Frames &amp; Trusses
'];
        $array[] = ['name' => 'Gas Fitting
'];
        $array[] = ['name' => 'Guttering
'];
        $array[] = ['name' => 'Heating Systems
'];
        $array[] = ['name' => 'Home Automation
'];
        $array[] = ['name' => 'Hot Water
'];
        $array[] = ['name' => 'Landscaping &amp; Gardening
'];
        $array[] = ['name' => 'Lawn Mowing
'];
        $array[] = ['name' => 'Locksmith
'];
        $array[] = ['name' => 'Millwork
'];
        $array[] = ['name' => 'Pavement
'];
        $array[] = ['name' => 'Pest Control
'];
        $array[] = ['name' => 'Pet Sitting
'];
        $array[] = ['name' => 'Plumbing
'];
        $array[] = ['name' => 'Removalist
'];
        $array[] = ['name' => 'Roofing
'];
        $array[] = ['name' => 'Tiling
'];
        $array[] = ['name' => 'Workshops
'];
        $array[] = ['name' => 'Yard Work &amp; Removal'];

        foreach($array as $a)
        {
            \opStarts\Skills::create([
                'name' => $a['name'],
                'slug' => str_slug($a['name']),
                'category' => '8',
            ]);
        }
    }
}
