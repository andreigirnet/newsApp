function calculateCalories() {
    const weight = parseFloat(document.getElementById('weight').value);
    const height = parseFloat(document.getElementById('height').value);
    const age = parseFloat(document.getElementById('age').value);
    const gender = document.getElementById('gender').value;
    const activity = document.getElementById('activity').value;
    const goal = document.getElementById('goal').value;

    let bmr = 0;

    // Calculate BMR based on gender
    if (gender === 'male') {
        bmr = 10 * weight + 6.25 * height - 5 * age + 5;
    } else if (gender === 'female') {
        bmr = 10 * weight + 6.25 * height - 5 * age - 161;
    }

    // Adjust BMR based on activity level
    let calorieNeeds = 0;
    if (activity === 'sedentary') {
        calorieNeeds = bmr * 1.2;
    } else if (activity === 'light') {
        calorieNeeds = bmr * 1.375;
    } else if (activity === 'moderate') {
        calorieNeeds = bmr * 1.55;
    } else if (activity === 'active') {
        calorieNeeds = bmr * 1.725;
    } else if (activity === 'extra') {
        calorieNeeds = bmr * 1.9;
    }

    // Adjust calories based on fitness goal
    let resultText = `To maintain your weight, you need approximately ${calorieNeeds.toFixed(2)} kcal/day.`;
    if (goal === 'loseFat') {
        const deficit = 500; // Recommended deficit for fat loss
        resultText = `To lose fat, you should consume around ${Math.max(calorieNeeds - deficit, 0).toFixed(2)} kcal/day.`;
    } else if (goal === 'gainMuscle') {
        const surplus = 500; // Recommended surplus for muscle gain
        resultText = `To gain muscle, you should consume around ${Math.max(calorieNeeds + surplus, 0).toFixed(2)} kcal/day.`;
    }

    document.getElementById('calorieResult').innerText = resultText;
}
