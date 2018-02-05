<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf=8" />
        <title>Keven SIAO : Virus</title>
        
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
        
    </head>
    

    <body> 
        <header>
            <h1 id="rainbow">Computer Virus</h1>
        </header>

        <body>
        
        <ul id="menu">
          <li class="menu_li"><a href="index.php">Home</a></li>
          <li class="menu_li"><a class="active" href="viruses.php">Viruses</a></li>
          <li class="menu_li"><a href="action.php">Action</a></li>
          <li class="menu_li"><a href="prevention.php">Prevention</a></li>
        </ul>
        
        <main>
            <div>
                <h2>Types of virus</h2>
                <img id="viruses" src="img/viruses.jpg" alt="Types of virus" /> 
                <ul>
                    <li class="list">The classic virus is a piece of program, often written in assembler, which fits into a normal program (the Trojan Horse), usually at the end, but it can vary. Whenever the user executes this "infected" program, he activates the virus which takes the opportunity to integrate with other executable programs. In addition, when it contains a payload, it can, after a certain time (which can be very long) or a particular event, perform a predetermined action. This action can range from a simple innocuous message to the deterioration of some operating system functions or the deterioration of some files or even the complete destruction of all data on the computer. In this case, we speak of "logical bomb" and "payload".</li>
                    <li class="list">A boot virus is installed in one of the boot sectors of a boot device, hard drive (the main boot sector, the "master boot record", or that of a partition), floppy disk, or other. It replaces an existing boot loader (or bootloader) (by copying the original elsewhere) or creates one (on a disk where there was none) but does not modify a program like a normal virus; when it replaces an existing startup program, it acts a bit like a "prepender" virus (which inserts at the beginning), but also infecting a blank device with any bootable software distinguishes it from the classic virus, which never attack "nothing".</li>
                    <li class="list">Macroviruses that attack Microsoft Office software macros (Word, Excel, etc.) with Microsoft's VBA. For example, by integrating into the normal.dot template of Word, a virus can be activated whenever the user starts this program.</li>
                    <li class="list">Virus-worms, which appeared around the year 2003 and developed rapidly in the years that followed, are classic viruses because they have a host program. But are similar to worms (in English "worm") because:</li>
                    <ul>
                        <li>Their mode of propagation is linked to the network, like worms, usually through the exploitation of security vulnerabilities.</li>
                        <li>Like worms, their action is discrete, and not destructive for users of the infected machine.</li>
                        <li>Like worms, they pursue broad-based goals, such as resource-saturated attack or Denial of Service (DoS) attack of a server by thousands of infected machines connecting simultaneously.</li>
                    </ul>
                    <li>Batch viruses, which appeared at the time when MS-DOS was the popular operating system, are "primitive" viruses. Although able to reproduce and infect other batch files, they are slow and have a very low infectivity. Some programmers have gone so far as to create encrypted and polymorphic batch viruses, which can be called a "technical feat" because the batch language is simple and primitive.</li>
                </ul>
                <p>Other threats exist in computer science, often distinguished by the absence of a reproductive system that characterizes viruses and worms; the term "malware" is in this case more appropriate</p>
            </div>
            
        </main>
        
        <footer>
            <hr><br/>
            <div id="source">
                <p>Sources : </p>
                <a class="site" href="https://fr.wikipedia.org/wiki/Virus_informatique">Wikipedia</a>
                <a class="site" href="https://support.microsoft.com/fr-fr/help/129972/how-to-prevent-and-remove-viruses-and-other-malware">Microsoft</a>
                <a class="site" href="https://fr.norton.com/norton-blog/2015/11/qu_est-ce_qu_un_viru.html">Norton</a>
            </div></br></br>
            
            <img src="img/csumb.jpg" alt="Logo of CSUMB" /> <br/><br/>
            CST336 : Internet Programming. 2018&copy; Keven Siao <br/>
            <strong>Disclaimer:</strong> Informations in this website can be fictitious.<br/>
            It is used for academic purposes only.
        </footer>

    </body>
</html>