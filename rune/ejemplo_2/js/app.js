var r = new Rune({
  container: "#canvas",
  width: 600,
  height: 600
});

r.line(0, 0, 100, 100);

r.rect(100, 100, 200, 150);

r.ellipse(300, 150, 200, 30);

r.circle(100, 360, 100);

r.triangle(0, 0, 100, 0, 100, 100);

// more complex shapes

r.polygon(350, 350).lineTo(100, 0).lineTo(100, 100).lineTo(0, 100);

r.path(300, 300).lineTo(200, 0).curveTo(100, 50, 0, 200, 0, 0)

r.draw();