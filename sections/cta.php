<div class="cta-section">
    <img src="img/haha.png" class="cta-image" alt="Logo" />
    <div class="cta-overlay">
        <h2>koop onze prudiucten!</h2>
        <p>we hebben heel veel autos</p>
        <a href="?page=subscribe" class="cta-button btn">Buy Now</a>
    </div>
</div>

<style>
.cta-section {
    position: relative;
    width: 100%;
    max-width: 80vw; /* Matches the parent's width from your container in style.css */
    margin: 0 auto;
    overflow: hidden;
}

.cta-image {
    width: 100%;
    height: auto;
    display: block;
}

.cta-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    text-align: left;
    color: #fff;
    text-shadow: 0 2px 4px rgba(0,0,0,0.6);
    padding: 0 1rem; /* adds padding so text doesn't touch the parent edges */
}

.cta-overlay h2 {
    font-size: 3rem;
    margin-bottom: 1rem;
}

.cta-overlay p {
    font-size: 1.8rem;
    margin-bottom: 2rem;
}

.cta-button {
    padding: 1rem 2rem;
    font-size: 1.5rem;
    background-color:rgb(226, 226, 226);
    color: rgb(30, 27, 27);
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.cta-button:hover {
    background-color: #e67e22;
    color: rgb(216, 197, 197);
}
</style>