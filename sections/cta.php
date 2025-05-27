<div style="padding:0 !important;">
    <div class="cta-section">
        <img src="img/haha.png" class="cta-image" alt="Logo" draggable="false" />
        <div class="cta-overlay">
            <h2>We hebben autos!</h2>
            <a href="#autos" class="cta-button btn">AUTOS!</a>
        </div>
    </div>
</div>


<!-- i placed the css here so i can inslude_once it in one command in index.php -->
<style>
    .cta-section {
        position: relative;
        width: 100%;
        max-width: 80vw;
        /* Matches the parent's width from your container in style.css */
        margin: 0 auto;
        overflow: hidden;
    }

    .cta-image {
        width: 100%;
        height: auto;
        display: block;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .cta-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        text-align: left;
        color: #fff;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.6);
        padding: 0 3rem;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    /* Ensure child elements in the overlay are also unselectable */
    .cta-overlay * {
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
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
        background-color: rgb(226, 226, 226);
        color: rgb(30, 27, 27);
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .cta-button:hover {
        background-color: #e67e22;
        color: rgb(216, 197, 197);
    }
</style>