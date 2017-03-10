<?php

use Illuminate\Database\Seeder;

class Engineering extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array[] = ['name' => 'Engineering
'];
        $array[] = ['name' => 'AutoCAD
'];
        $array[] = ['name' => 'Mathematics
'];
        $array[] = ['name' => 'Matlab and Mathematica
'];
        $array[] = ['name' => 'Data Mining
'];
        $array[] = ['name' => 'Statistics
'];
        $array[] = ['name' => 'Electrical Engineering
'];
        $array[] = ['name' => 'Mechanical Engineering
'];
        $array[] = ['name' => 'Electronics
'];
        $array[] = ['name' => 'Algorithm
'];
        $array[] = ['name' => 'CAD/CAM
'];
        $array[] = ['name' => 'Statistical Analysis
'];
        $array[] = ['name' => 'Microcontroller
'];
        $array[] = ['name' => 'Solidworks
'];
        $array[] = ['name' => 'Machine Learning
'];
        $array[] = ['name' => 'Civil Engineering
'];
        $array[] = ['name' => 'PCB Layout
'];
        $array[] = ['name' => 'Home Design
'];
        $array[] = ['name' => 'Arduino
'];
        $array[] = ['name' => 'Digital Design
'];
        $array[] = ['name' => 'Structural Engineering
'];
        $array[] = ['name' => 'Materials Engineering
'];
        $array[] = ['name' => 'Scientific Research
'];
        $array[] = ['name' => 'Circuit Design
'];
        $array[] = ['name' => 'Data Science
'];
        $array[] = ['name' => 'Manufacturing Design
'];
        $array[] = ['name' => 'Verilog / VHDL
'];
        $array[] = ['name' => 'Wireless
'];
        $array[] = ['name' => 'Medical
'];
        $array[] = ['name' => 'Biology
'];
        $array[] = ['name' => 'Chemical Engineering
'];
        $array[] = ['name' => 'Engineering Drawing
'];
        $array[] = ['name' => 'GPS
'];
        $array[] = ['name' => 'Physics
'];
        $array[] = ['name' => 'Telecommunications Engineering
'];
        $array[] = ['name' => 'FPGA
'];
        $array[] = ['name' => 'Industrial Engineering
'];
        $array[] = ['name' => 'Nanotechnology
'];
        $array[] = ['name' => 'Finite Element Analysis
'];
        $array[] = ['name' => 'CATIA
'];
        $array[] = ['name' => 'PLC &amp; SCADA
'];
        $array[] = ['name' => 'Imaging
'];
        $array[] = ['name' => 'Product Management
'];
        $array[] = ['name' => 'Robotics
'];
        $array[] = ['name' => 'Cryptography
'];
        $array[] = ['name' => 'Mechatronics
'];
        $array[] = ['name' => 'Project Scheduling
'];
        $array[] = ['name' => 'Construction Monitoring
'];
        $array[] = ['name' => 'Geotechnical Engineering
'];
        $array[] = ['name' => 'Microbiology
'];
        $array[] = ['name' => 'Microstation
'];
        $array[] = ['name' => 'Natural Language
'];
        $array[] = ['name' => 'Remote Sensing
'];
        $array[] = ['name' => 'Biotechnology
'];
        $array[] = ['name' => 'Geospatial
'];
        $array[] = ['name' => 'Linear Programming
'];
        $array[] = ['name' => 'Aerospace Engineering
'];
        $array[] = ['name' => 'Broadcast Engineering
'];
        $array[] = ['name' => 'Drones
'];
        $array[] = ['name' => 'Petroleum Engineering
'];
        $array[] = ['name' => 'Aeronautical Engineering
'];
        $array[] = ['name' => 'Agronomy
'];
        $array[] = ['name' => 'Human Sciences
'];
        $array[] = ['name' => 'Instrumentation
'];
        $array[] = ['name' => 'Mining Engineering
'];
        $array[] = ['name' => 'Renewable Energy Design
'];
        $array[] = ['name' => 'Surfboard Design
'];
        $array[] = ['name' => 'Textile Engineering
'];
        $array[] = ['name' => 'Astrophysics
'];
        $array[] = ['name' => 'Clean Technology
'];
        $array[] = ['name' => 'Climate Sciences
'];
        $array[] = ['name' => 'Genetic Engineering
'];
        $array[] = ['name' => 'Geology
'];
        $array[] = ['name' => 'Quantum
'];
        $array[] = ['name' => 'RTOS
'];
        $array[] = ['name' => 'Wolfram'];

        foreach($array as $a)
        {
            \opStarts\Skills::create([
                'name' => $a['name'],
                'slug' => str_slug($a['name']),
                'category' => '7'
            ]);
        }
    }
}
