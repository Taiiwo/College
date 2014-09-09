<center>Operating Systems</center>
===============
---------------

###Purpose
One purpose of an operating system is to create an interface for users to control the computer and it's hardware in some way. The operating system is resonsible for all communication with the hardware, sometimes by communicating through the BIOS (In cases where hardware acceleration is not utilized)

###Function

An OS has 4 main functions.

- Manages memory
    - Allocates and retrieves data to and from memory addresses in the RAM
- Process allocation
    - Controls the movement of data through CPU memory buffers
- Hardware interface
    - Provides an interface to the hardware for the software
- Storage read/write
    - Allocates and retrieves data to and from memory addresses in storage media

###Usage The way most modern desktop operating systems are used is via a GUI. This is most commonly the 'window' based layout, where programs apear in boxes, and the 
user has the ability to run multiple programs at a time. 

The only other non-GUI OS type commonly used today is the command line interface OS. These are most commonly used in large servers. These servers are used for their 
constant uptime and large power, so getting rid of un-needed addons is essentail to having a reliable and efficient server.

###OS Examples
An example of a GUI-based OS is 'elementaryOS'. elementaryOS is an Ubuntu based OS with a custom window shell called 'Pantheon'. It is aimed at the average user for 
desktop computing. The GUI is extensive and built for end to end quality, and the Linux base keeps it flexible and secure. Drawbacks include it's unoptimized 
performance that comes with a GUI based OS, and would be a unsuitible OS for a server for this reason.

On the other hand, and example of a command line OS is 'FreeBSD'. FreeBSD is a distribution of the BSD OS that focuses on free licencing. Due to the superior process 
distribution system, FreeBSD is a very popular server OS as it can deliver unmached speed and reliability. The only drawback of using FreeBSD is that due to the 
different pre-execution procedures, programs must be recompiled with special options in order to support the OS, and although all of the best and most popular 
server-oriented programs (Such as Apache and MySQL) have already been compiled, FreeBSD compilation is far down the list of priorities for most of the newer software, 
unfortunately.

####Feature comparison:

<table style="text-align: center;">
<tr> <td>elementaryOS</td>  <td>Feature</td>  <td>FreeBSD</td> </tr>
<tr> <td>yes</td>  <td>GUI</td>  <td>no</td> </tr>
<tr> <td>no</td>  <td>Low RAM Requirements</td>  <td>yes</td> </tr>
<tr> <td>no</td>  <td>Low storage requirements</td>  <td>yes</td> </tr>
<tr> <td>no</td>  <td>Reliable for server computing</td>  <td>yes</td> </tr>
<tr> <td>yes</td>  <td>Widely supported</td>  <td>no</td> </tr>
<tr> <td>yes</td>  <td>Modification</td>  <td>yes</td> </tr>
<tr> <td>no</td>  <td>Distribution without credit</td>  <td>yes</td> </tr>
<tr> <td></td>  <td></td>  <td></td> </tr>
</table>

As you can see, elementaryOS has a GUI, whereas FreeBSD does not. elementaryOS has a GUI as it is a desktop OS, and needs to be user friendly, even if it means losing 
out on efficiency.

FreeBSD on the other hand does not come preinstalled with a GUI that starts automatically. This is because FreeBSD does prioritize speed over user friendliness. This 
makes it a perfect OS for servers.

Another difference is the hardware requirements. elementaryOS needs more storage to store it's programs. FreeBSD however takes a much simpler approach to programs, 
with minimal interface with the user. elementaryOS requires more RAM to run, as the programs it must run simultaniously to generate a GUI all require memory space. 
FreeBSD on the other hand has less programs running initially, using less memory, and giving the user's programs much more space to fill.
