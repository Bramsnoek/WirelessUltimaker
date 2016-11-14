
G21 ;metric values
G90 ;absolute positioning
M82 ;set extruder to absolute mode
M107 ;start with the fan off
M190 S75 ;Heat up bed 
M109 S242 ;Heat up extruder
G28; Home Axis
G29; Z-Probe the bed (requires Z-Probe!)
G1 Z5.0 F8900 ;move the bed up
G1 Z15.0 F100 ;move the platform down 15mm

G1 F12000 X5 Y10 ;Move To Left Bottom
G1 F200 E3 ;extrude 3mm of feed stock
G92 E0 ;zero the extruded length again
G1 F100