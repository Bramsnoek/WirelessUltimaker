G21 ;metric values
G90 ;absolute positioning
M82 ;set extruder to absolute mode
M107 ;start with the fan off
M109 S180 B210 F1;activate auto temp min 180 max 210 scaling factor 1 (for PLA)
G28; Home Axis
G29; Z-Probe the bed (requires Z-Probe!)
G1 Z5.0 F9000 ;move the head 5mm up for CYA clearance
G92 E0 ;zero the extruded length
M117 Cleaning...;Put Cleaning message on screen
G1 X100 Y0 F4000 ; move half way along the front edge
G1 Z1 ; move nozzle close to bed
M109 S200 ; heat nozzle to 200 degC and wait until reached
G4 P10000 ; wait 10 seconds for nozzle length to stabilize
G1 E10 ; extrude 10 mm of filament
G1 z15 F12000 E5 ; move 15 mm up, fast, while extruding 5mm
G92 E0 ; reset extruder
M117 Printing...;Put printing message on LCD screen