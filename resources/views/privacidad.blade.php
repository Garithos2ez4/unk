@extends('layouts.app')

@section('title', 'Política de Privacidad')

@section('content')
<div class="container">
    <br>
    <div class="row">
        <br>
        <h2 class="text-center fw-bold">POLÍTICAS DE PRIVACIDAD</h2>
        <p style="text-align:justify">
        En cumplimiento de lo dispuesto por la Ley N° 29733, Ley de Protección de Datos Personales y su reglamento aprobado por Decreto Supremo N° 003-2013-JUS, {{$empresa->nombreComercial}} desea poner en conocimiento de sus usuarios, los siguientes aspectos relacionados con sus datos personales:
        </p>
        <br>
        <h5>1. OBJETIVO:</h5>
        <p style="text-align:justify">
        El objetivo de la presente política es la declaración y compromiso formal de la empresa {{$empresa->razonSocial}} con RUC {{$empresa->rucEmpresa}}, en informar a los usuarios de los diferentes servicios prestados a través de su portal web, acerca del tratamiento y usos a los que se someten los datos de carácter personal que se obtengan.
        </p>
        <h5>2. REFERENCIAS NORMATIVAS:</h5>
        <p style="text-align:justify">
        2.1. Ley N° 29733 – Ley de Protección de Datos Personales.
        </p>
        
        <h5>3. PRINCIPIOS:</h5>
        <p style="text-align:justify">
        En la empresa {{$empresa->nombreComercial}} respetamos los principios de protección de datos personales
        </p>
        <p style="text-align:justify">
        3.1. Principio de legalidad, se rechaza la recopilación de los datos personales de los usuarios por medios ilegales y fraudulentos.
        </p>
        <p style="text-align:justify">
        3.2. Principio de consentimiento, se obtendrá el consentimiento de los usuarios de manera libre, informado, expreso, inequívoco y previo al tratamiento de sus datos personales.
        </p>
        <p style="text-align:justify">
        3.3. Principio de finalidad, los datos personales de nuestros usuarios se recopilarán para una finalidad determinada, explícita y lícita, y no se extenderá a otra finalidad que no haya sido la establecida de manera inequívoca como tal al momento de su recopilación.
        </p>
        <p style="text-align:justify">
        3.4. Principio de proporcionalidad, todo tratamiento de datos personales de nuestros usuarios será adecuado, relevante y no excesivo a la finalidad para la que estos hubiesen sido recopilados.
        </p>
        <p style="text-align:justify">
        3.5. Principio de calidad, los datos personales que vayan a ser tratados serán veraces, exactos y, en la medida de lo posible, actualizados, necesarios, pertinentes y adecuados respecto de la finalidad para la que fueron recopilados. Se conservarán de forma tal que se garantice su seguridad y solo por el tiempo necesario para cumplir con la finalidad del tratamiento.
        </p>
        <p style="text-align:justify">
        3.6. Principio de seguridad, la empresa {{$empresa->nombreComercial}} adopta las medidas técnicas, organizativas y legales necesarias para garantizar la seguridad y confidencialidad de los datos personales. La empresa {{$empresa->nombreComercial}} cuenta con las medidas de seguridad apropiadas, y acordes con el tratamiento que se vaya a efectuar y con la categoría de datos personales de que se trate.
        </p>
        
        <h5>4. DEFINICIÓN DE DATOS PERSONALES:</h5>
        <p style="text-align:justify">
        4.1. De acuerdo con la ley, se define el término Datos Personales como “aquella información numérica, alfabética, gráfica, fotográfica, acústica, sobre hábitos personales, o de cualquier otro tipo concerniente a las personas naturales que las identifica o las hace identificables a través de medios que puedan ser razonablemente utilizados.” La empresa {{$empresa->nombreComercial}} considera como datos personales, a toda aquella información que el Usuario ingrese voluntariamente a través de cualquiera de nuestros formularios en nuestros sitios web o la que se envía por correo electrónico.
        </p>
        <h5>5. TITULARIDAD DE LA BASE DE DATOS:</h5>
        <p style="text-align:justify">
        5.1. Los datos personales que puedan ser suministrados a través del sitio web u otro medio serán incorporados a los bancos de datos bajo la titularidad de la empresa {{$empresa->nombreComercial}}.
        </p>
        <h5>6. FINALIDADES DEL TRATAMIENTO DE LA INFORMACIÓN:</h5>
        <p style="text-align:justify">
        6.1. De conformidad con la Ley N° 29733 - Ley de Protección de Datos Personales, el interesado otorgará su consentimiento expreso para que los datos personales que facilite queden incorporados en el Banco de Datos Personales de Personas Interesadas en la empresa {{$empresa->nombreComercial}} y sean tratados por esta con la finalidad de poder almacenarla, procesarla y absolver sus consultas; dándoles usos que incluyen temas referidos al análisis de perfiles, publicidad (boletín de noticias), prospección comercial y fines estadísticos. El usuario autoriza a que la empresa {{$empresa->nombreComercial}} mantenga sus datos personales en el banco de datos referido en tanto sean útiles para la finalidad y usos antes mencionados.
        </p>
        <p style="text-align:justify">
        De acuerdo con, Ministerio de Justicia y Derechos Humanos (2011). Ley de protección de datos personales. <a class="text-empresa-dos" href=" https://www.minjus.gob.pe/wp-content/uploads/2013/04/LEY-29733.pdf">https://www.minjus.gob.pe/wp-content/uploads/2013/04/LEY-29733.pdf</a>
        </p>
        <p style="text-align:justify">
        El titular de datos personales tiene derecho a ser informado en forma detallada, sencilla, expresa, inequívoca y de manera previa a su recopilación, sobre la finalidad para la que sus datos personales serán tratados; quiénes son o pueden ser sus destinatarios, la existencia del banco de datos en que se almacenarán, así como la identidad y domicilio de su titular y, de ser el caso, del encargado del tratamiento de sus datos personales; el carácter obligatorio o facultativo de sus respuestas al cuestionario que se le proponga, en especial en cuanto a los datos sensibles; la transferencia de los datos personales; las consecuencias de proporcionar sus datos personales y de su negativa a hacerlo; el tiempo durante el cual se conserven sus datos personales; y la posibilidad de ejercer los derechos que la ley le concede y los medios previstos para ello. Si los datos personales son recogidos en línea a través de redes de comunicaciones electrónicas, las obligaciones del presente artículo pueden satisfacerse mediante la publicación de políticas de privacidad, las que deben ser fácilmente accesibles e identificables.
        </p>
        <h5>7. DECLARACIÓN DE PRIVACIDAD:</h5>
        <p style="text-align:justify">
        7.1. La  empresa {{$empresa->nombreComercial}} no recopila datos personales sobre el Usuario, excepto cuando él mismo brinde información voluntariamente, al registrarse en el sitios web o cuando envíe un correo electrónico u otra comunicación dirigida a la empresa {{$empresa->nombreComercial}}.  {{$empresa->nombreComercial}} no procesará ni transferirá los datos personales sin previo consentimiento del Usuario.
        </p>
         
        
        <h5>8. SEGURIDAD Y CONFIDENCIALIDAD DE LOS DATOS:</h5>
        <p style="text-align:justify">
        8.1. La empresa {{$empresa->nombreComercial}} se compromete a cumplir con los estándares de seguridad y confidencialidad necesarios para asegurar la confiabilidad, integridad y disponibilidad de la información recopilada de los usuarios. El Usuario es el único responsable de suministrar sus datos personales a la empresa {{$empresa->nombreComercial}}.
        </p>
         
        
        <h5>9.  DERECHOS DE LOS USUARIOS:</h5>
        <p style="text-align:justify">
        9.1. De conformidad con la Ley, el Usuario podrá solicitar, en cualquier momento, sus derechos de acceso, actualización, rectificación, inclusión, oposición y supresión o cancelación de datos personales enviando una solicitud firmada a la dirección de correo electrónico {{$empresa->correoEmpresa}}.
        </p>
        <h5>10. DEL CONSENTIMIENTO DEL USUARIO Y ACEPTACIÓN DE LOS TÉRMINOS:</h5>
        <p style="text-align:justify">
        10.1. Esta declaración de privacidad y confidencialidad descrita en la presente política constituye un acuerdo válido entre el Usuario y la empresa {{$empresa->nombreComercial}} , que confirma el conocimiento, entendimiento y aceptación por parte del Usuario de lo expuesto con los fines expresados. Si lo autorizas, podremos incluir tu información en nuestras bases de datos personales para poder almacenarla y procesarla; así mismo, podremos ofrecerte cualquiera de los productos o servicios de {{$empresa->nombreComercial}} a través de cualquier medio verbal, escrito o electrónico. En caso no estar de acuerdo, el usuario no deberá proporcionar ninguna información personal, ni utilizar el servicio o cualquier información relacionada con los sitios web de la empresa {{$empresa->nombreComercial}}.
        </p>
        <p style="text-align:justify">
        De acuerdo con, Ministerio de Justicia y Derechos Humanos (2011). Ley de protección de datos personales. <a class="text-empresa-dos" href="https://www.minjus.gob.pe/wp-content/uploads/2013/04/LEY-29733.pdf">https://www.minjus.gob.pe/wp-content/uploads/2013/04/LEY-29733.pdf</a>
        </p>
        <h5>Características del consentimiento</h5>
        <p style="text-align:justify">
        1. Libre: Sin que medie error, mala fe, violencia o dolo que puedan afectar la manifestación de voluntad del titular de los datos personales. La entrega de obsequios o el otorgamiento de beneficios al titular de los datos personales con ocasión de su consentimiento no afectan la condición de libertad que tiene para otorgarlo, salvo en el caso de menores de edad, en los supuestos en que se admite su consentimiento, en que no se considerará libre el consentimiento otorgado mediando obsequios o beneficios.
        </p>
        <p style="text-align:justify">
        El condicionamiento de la prestación de un servicio, o la advertencia o amenaza de denegar el acceso a beneficios o servicios que normalmente son de acceso no restringido, sí afecta la libertad de quien otorga consentimiento para el tratamiento de sus datos personales, si los datos solicitados no son indispensables para la prestación de los beneficios o servicios.
        </p>
        <p style="text-align:justify">
        2. Previo: Con anterioridad a la recopilación de los datos o en su caso, anterior al tratamiento distinto a aquel por el cual ya se recopilaron.
        </p>
        <p style="text-align:justify">
        3. Expreso e Inequívoco: Cuando el consentimiento haya sido manifestado en condiciones que no admitan dudas de su otorgamiento. Se considera que el consentimiento expreso se otorgó verbalmente cuando el titular lo exterioriza oralmente de manera presencial o mediante el uso de cualquier tecnología que permita la interlocución oral.
        </p>
        <p style="text-align:justify">
        Se considera consentimiento escrito a aquél que otorga el titular mediante un documento con su firma autógrafa, huella dactilar o cualquier otro mecanismo autorizado por el ordenamiento jurídico que queda o pueda ser impreso en una superficie de papel o similar.
        </p>
        <p style="text-align:justify">
        La condición de expreso no se limita a la manifestación verbal o escrita. En sentido restrictivo y siempre de acuerdo con lo dispuesto por el artículo 7 del presente reglamento, se considerará consentimiento expreso a aquel que se manifieste mediante la conducta del titular que evidencie que ha consentido inequívocamente, dado que de lo contrario su conducta, necesariamente, hubiera sido otra.
        </p>
        <p style="text-align:justify">
        Tratándose del entorno digital, también se considera expresa la manifestación consistente en “hacer clic”, “cliquear” o “pinchar”, “dar un toque”, “touch” o “pad” u otros similares. En este contexto el consentimiento escrito podrá otorgarse mediante firma electrónica, mediante escritura que quede grabada, de forma tal que pueda ser leída e impresa, o que por cualquier otro mecanismo o procedimiento establecido permita identificar al titular y recabar su consentimiento, a través de texto escrito. También podrá otorgarse mediante texto preestablecido, fácilmente visible, legible y en lenguaje sencillo, que el titular pueda hacer suyo, o no, mediante una respuesta escrita, gráfica o mediante clic o pinchado. La sola conducta de expresar voluntad en cualquiera de las formas reguladas en el presente numeral no elimina, ni da por cumplidos, los otros requisitos del consentimiento referidos a la libertad, oportunidad e información.
        </p>
        <p style="text-align:justify">
        4. Informado: Cuando al titular de los datos personales se le comunique clara, expresa e indubitablemente, con lenguaje sencillo, cuando menos de lo siguiente:
        </p>
        <p style="text-align:justify">
        La identidad y domicilio o dirección del titular del banco de datos personales o del responsable del tratamiento al que puede dirigirse para revocar el consentimiento o ejercer sus derechos.
        </p>
        <p style="text-align:justify">
        La finalidad o finalidades del tratamiento a las que sus datos serán sometidos.
        </p>
        <p style="text-align:justify">
        La identidad de los que son o pueden ser sus destinatarios, de ser el caso.
        </p>
        <p style="text-align:justify">
        La existencia del banco de datos personales en que se almacenarán, cuando corresponda.
        </p>
        <p style="text-align:justify">
        El carácter obligatorio o facultativo de sus respuestas al cuestionario que se le proponga, cuando sea el caso.
        </p>
        <p style="text-align:justify">
        Las consecuencias de proporcionar sus datos personales y de su negativa a hacerlo.
        </p>
        <p style="text-align:justify">
        En su caso, la transferencia nacional e internacional de datos que se efectúen.
        </p>
    </div>
</div>
@endsection