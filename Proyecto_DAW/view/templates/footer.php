<!-- Footer-->
<Style>
    .footer {
        background: rgb(2, 0, 36);
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 27%, rgba(9, 9, 121, 1) 76%, rgba(52, 80, 85, 1) 100%);
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        width: 100%;
        height: 170px;
        position: fixed;
        bottom: 0;
        padding: 0;
        gap: 40px;
    }

    .row {
        display: flex;
        width: 100%;
    }

    .redes {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .redes a {
        text-decoration: none;
        font-size: 20px;
        color: #fff;
        cursor: pointer;
    }

    .direccion {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-center: center;
        text-align: center;
        color: #fff;
        border-left: 2px solid #fff;
        border-right: 2px solid #fff;
    }

    .direccion a {
        text-decoration: none;
        color: #fff;
        cursor: pointer;
    }

    .links {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .links a {
        text-decoration: none;
        color: #fff;
        cursor: pointer;
        font-size: 20px;
    }
</Style>
<footer class="footer">
    <div class="row">
        <div class="col-sm-4 redes">
            <a href="http://www.facebook.com/">Facebook</a>
            <a href="http://www.twitter.com/">Twitter</a>
            <a href="http://www.instagram.com/">Instagram</a>
            <a href="http://www.google.com/">Google+</a>
        </div>

        <div class="col-sm-4 direccion">
            <address>
                <h3>Consultorio Medico MedicalCorp.</h3>
                <p>Samborondon, Ecuador</p>
            </address>
            <div>
                <p class="text-center"> Copyright ©
                    <?php echo date('Y'); ?> Consultorio Medico MedicalCorp. Todos los derechos reservados
                </p>
            </div>
        </div>

        <div class="col-sm-4 links">
            <a href="">Nosotros</a>
            <a href="">T&eacute;rminos y condiciones</a>
            <a href="">Contactos</a>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.min.js"></script>


</body>

</html>