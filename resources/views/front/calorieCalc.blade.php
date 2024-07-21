@extends('welcome')
@section('content')
    <div class="container">
        <div class="row flex justify-content-center">
            <div class="calorieCalc">
                <h1 class="h1-calorie">Calorie Calculator</h1>

                <label for="weight" class="label-calorie">Weight (kg):</label>
                <input type="number" id="weight" class="input-calorie" placeholder="Enter weight" oninput="calculateCalories()">

                <label for="height" class="label-calorie">Height (cm):</label>
                <input type="number" id="height" class="input-calorie" placeholder="Enter height" oninput="calculateCalories()">

                <label for="age" class="label-calorie">Age (years):</label>
                <input type="number" id="age" class="input-calorie" placeholder="Enter age" oninput="calculateCalories()">

                <label for="gender" class="label-calorie">Gender:</label>
                <select id="gender" class="input-calorie" onchange="calculateCalories()">
                    <option value="">--Select--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

                <label for="activity" class="label-calorie">Activity Level:</label>
                <select id="activity" class="input-calorie" onchange="calculateCalories()">
                    <option value="sedentary">Sedentary (little or no exercise)</option>
                    <option value="light">Lightly active (light exercise/sports 1-3 days/week)</option>
                    <option value="moderate">Moderately active (moderate exercise/sports 3-5 days/week)</option>
                    <option value="active">Very active (hard exercise/sports 6-7 days a week)</option>
                    <option value="extra">Extra active (very hard exercise/sports & a physical job)</option>
                </select>

                <label for="goal" class="label-calorie">Fitness Goal:</label>
                <select id="goal" class="input-calorie" onchange="calculateCalories()">
                    <option value="">--Select--</option>
                    <option value="maintain">Maintain Weight</option>
                    <option value="loseFat">Lose Fat</option>
                    <option value="gainMuscle">Gain Muscle</option>
                </select>

                <div class="result-calorie" id="calorieResult"></div>
            </div>
        </div>
    </div>
@endsection
