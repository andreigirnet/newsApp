function calculateRevenue() {
    const shortRate = 0.04; // 0.1 cents per 1000 views
    const longRate = 1.5; // 1 dollar per 1000 views

    let shortViews = document.getElementById('shortViews').value;
    let longViews = document.getElementById('longViews').value;

    let shortRevenue = (shortViews / 1000) * shortRate;
    let longRevenue = (longViews / 1000) * longRate;

    let totalRevenue = shortRevenue + longRevenue;

    document.getElementById('shortRevenueResult').innerText = `Shorts Revenue: $${shortRevenue.toFixed(6)}`;
    document.getElementById('longRevenueResult').innerText = `Long Videos Revenue: $${longRevenue.toFixed(2)}`;
    document.getElementById('totalRevenueResult').innerText = `Total Revenue: $${totalRevenue.toFixed(2)}`;
}
