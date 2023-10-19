<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="celebrity-scratchoff.css">
    <title>Celebrity Scratch-Off</title>
</head>
<body>
    
<h1 class="intro">Celebrities</h1>

<p class="intro">Scratch off the blue field to reveal a celebrity!</p>

<div class="celebrity_scratch-off">
    @foreach($celebrities as $celebrity)
    <figure class="scratchOff-container">
        <div class="scratch-card">
            <canvas class="scratch-mask"></canvas>
            <img class="scratch-image" src="{{ $celebrity->image }}" alt="{{ $celebrity->name }}">
        </div>
        <div class="celebrity-info">{{ $celebrity->name }}</div>
    </figure>
    @endforeach
</div>

<script>
const scratchCards = document.querySelectorAll('.scratch-card');

scratchCards.forEach((card) => {
    const canvas = card.querySelector('.scratch-mask');
    const ctx = canvas.getContext('2d');
    let isScratching = false;

    // Set up the canvas dimensions to match the container
    canvas.width = card.clientWidth;
    canvas.height = card.clientHeight;

    // Set initial transparency
    ctx.fillStyle = 'rgba(22, 184, 243, 1)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // Event listeners
    canvas.addEventListener('mousedown', () => {
        isScratching = true;
    });

    canvas.addEventListener('mouseup', () => {
        isScratching = false;
    });

    canvas.addEventListener('mousemove', (e) => {
        if (isScratching) {
            const { offsetX, offsetY } = e;
            const radius = 40; // Adjust the brush size as needed

            // Clear a circular area to reveal the underlying content
            ctx.globalCompositeOperation = 'destination-out';
            ctx.beginPath();
            ctx.arc(offsetX, offsetY, radius, 0, Math.PI * 2);
            ctx.fill();
            ctx.globalCompositeOperation = 'source-over';
        }
    });
});
</script>
</body>
</html>
